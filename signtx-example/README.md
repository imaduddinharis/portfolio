# ETH Sign Transaction
#### by: Imaduddin Haris Nasution
email: imaduddinhariss@gmail.com
github: github.com/imaduddinharis/portfolio

API From:
[![Alchemy](https://financialit.net/sites/default/files/alchemy.jpg)](https://www.alchemyapi.io/)

## Installation
Install the dependencies and start the server.

```sh
cd sendtx-example
npm install @alch/alchemy-web3
npm install websocket
node server
```

## Test Send ETH
Open the .env file and change the private key to the private key of the account you sent from
```sh
PRIVATE_KEY = ""
```
###### if you want to using alchemy api not only for test, please create account in [Alchemy](https://alchemyapi.io) and change the API_URL from .env file because this api is limited and can used only in ropsten testnet

After that, open client.js and change json data and run the client in other terminal
```sh
node client.js
```
##### see the result in server terminal where you running the server


## License

MIT
