async function main() {
    const WebSocket = require("ws")
    const ws = new WebSocket("ws://localhost:9005")

    ws.addEventListener("open", e => {
        ws.send(JSON.stringify({
            from_address: '',
            to_address: '',
            amount: ''
        }))
    })
}
main()