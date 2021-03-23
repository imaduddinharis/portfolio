const WebSocket = require("ws")
require('dotenv').config();

const wss = new WebSocket.Server({ port: 9005 })

const { API_URL, PRIVATE_KEY } = process.env;
const { createAlchemyWeb3 } = require("@alch/alchemy-web3");
const web3 = createAlchemyWeb3(API_URL);

wss.on("connection", ws => {
    ws.on("message", message => {
        try {
            const data = JSON.parse(message);
            let from = data.from_address
            let to = data.to_address
            let amount = data.amount.split(' ')
            let value = (amount.length === 2) ? amount[0] * 1000000000000000000 : 0
            let gas = 30000

            // console.log(value)
            async function main() {
                const myAddress = from // public address

                const nonce = await web3.eth.getTransactionCount(myAddress, 'latest'); // nonce id starts from 0

                const transaction = {
                    'to': to, // faucet address to return eth
                    'value': value, // 1 ETH
                    'gas': gas,
                    'nonce': nonce,
                };
                const signedTx = await web3.eth.accounts.signTransaction(transaction, PRIVATE_KEY);

                web3.eth.sendSignedTransaction(signedTx.rawTransaction, function(error, hash) {
                    if (!error) {
                        console.log(JSON.stringify({
                            id: nonce,
                            tx: hash
                        }));
                    } else {
                        console.log("❗Something went wrong while submitting your transaction:", error)
                    }
                });
            }
            main()
        } catch (e) {
            console.log('Something went wrong')
        }
    })
})