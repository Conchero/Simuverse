const canvas = document.getElementById("system-canvas");
const ctx = canvas.getContext("2d");

ctx.beginPath();
ctx.fillStyle = "rgb(200, 0, 0)";
ctx.arc(canvas.width/2, canvas.height/2, 50, 0, 2 * Math.PI);
ctx.fill();
ctx.stroke();


fetch("/backend/testfetch.php?id=2").then(response => {
    if(!response.ok){
         throw new Error("Something went wrong!");
    }

    return response.json();
}).then((data) => {
    alert(data);
}).catch(error => {
    console.log(error);
})


const perfectFrameTime = 1000 / 60;
let deltaTime = 0;
let lastTimestamp = 0;

function start() {
    requestAnimationFrame(update);
}

function update(timestamp) {
    requestAnimationFrame(update);
    deltaTime = (timestamp - lastTimestamp) / perfectFrameTime;
    lastTimestamp = timestamp;

   console.log(deltaTime);

}

start();