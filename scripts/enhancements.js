// Enhancement 1
// set timer for quiz --> timer 10 minutes

function timer() {
    if (total_time != 0) {
        total_time--; //total_time will be decreased by 1 each time the function is called 

        const minutes = Math.floor(total_time / 60);
        let seconds = total_time % 60;

        seconds = seconds < 10 ? '0' + seconds : seconds;  // if seconds < 10 then add a 0 before displayed seconds

        document.getElementById("countdown").innerHTML = `${minutes}: ${seconds}`;

        if (total_time <= 60 && !lessThan1min) { // If the total_time is less than 60, there would be an alert to notice the customer that you have 1 minute left. After clicking "Okay", the alert will disapear and the timer will continue to count down
            alert("You have 1 minute left");
            lessThan1min = true;
        }
    } else { //When the remaining seconds reach 0, it will call the clear Interval to stop counting down 
        clearInterval(interval);
        document.getElementById('form').submit(); // After stoping counting, the quiz is automatically submitted
    }
}

function enhancement() {
    alert("You may get 10 minutes to finish the quiz. After 10 minutes, the quiz will be automatically submitted.");
    total_time = 600;
    lessThan1min = false;
    interval = setInterval(timer, 1000);
}

// Enhancement 2
// Fireworks

"use strict";

let canvas, width, height, ctx;
let fireworks = [];
let particles = [];

function firework_display() {
	document.getElementById("canvas").style.display = "block";
	setTimeout(setup,1);
	setInterval(loop, 1/60);
}

function setup() {
	canvas = document.getElementById("canvas");
	setSize(canvas);
	ctx = canvas.getContext("2d");
	ctx.fillStyle = "#000000";
	ctx.fillRect(0, 0, width, height);
	fireworks.push(new Firework(Math.random()*(width-200)+100));
	window.addEventListener("resize",windowResized);
	document.addEventListener("click",onClick);
}

setTimeout(setup,1);

function loop(){
	ctx.globalAlpha = 0.1;
	ctx.fillStyle = "#000000";
	ctx.fillRect(0, 0, width, height);
	ctx.globalAlpha = 1;

	for(let i=0; i<fireworks.length; i++){
		let done = fireworks[i].update();
		fireworks[i].draw();
		if(done) fireworks.splice(i, 1);
	}

	for(let i=0; i<particles.length; i++){
		particles[i].update();
		particles[i].draw();
		if(particles[i].lifetime>80) particles.splice(i,1);
	}

	if(Math.random()<1/60) fireworks.push(new Firework(Math.random()*(width-200)+100));
}
setInterval(loop, 1/60);

class Particle{
	constructor(x, y, col){
		this.x = x;
		this.y = y;
		this.col = col;
		this.vel = randomVec(2);  // assigning random velocity to each particle
		this.lifetime = 0;
	}

	update(){  // constantly update pos and vel of particle for randomness
		this.x += this.vel.x;
		this.y += this.vel.y;
		this.vel.y += 0.02;
		this.vel.x *= 0.99;
		this.vel.y *= 0.99;
		this.lifetime++;
	}

	draw(){
		ctx.globalAlpha = Math.max(1-this.lifetime/80, 0);
		ctx.fillStyle = this.col;
		ctx.fillRect(this.x, this.y, 2, 2);
	}
}

class Firework{
	constructor(x){
		this.x = x;
		this.y = height;
		this.isBlown = false;
		this.col = randomCol();
	}

	update(){
		this.y -= 3;
		if(this.y < 350-Math.sqrt(Math.random()*500)*40){
			this.isBlown = true;
			for(let i=0; i<60; i++){
				particles.push(new Particle(this.x, this.y, this.col))  // explode particle
			}
		}
		return this.isBlown;
	}

	draw(){
		ctx.globalAlpha = 1;
		ctx.fillStyle = this.col;
		ctx.fillRect(this.x, this.y, 2, 2);
	}
}

function randomCol(){
	var letter = '0123456789ABCDEF';
	var nums = [];

	for(var i=0; i<3; i++){
		nums[i] = Math.floor(Math.random()*256);
	}

	let brightest = 0;
	for(var i=0; i<3; i++){
		if(brightest<nums[i]) brightest = nums[i];
	}

	brightest /=255;
	for(var i=0; i<3; i++){
		nums[i] /= brightest;
	}

	let color = "#";
	for(var i=0; i<3; i++){
		color += letter[Math.floor(nums[i]/16)];
		color += letter[Math.floor(nums[i]%16)];
	}
	return color;
}

function randomVec(max){
	let dir = Math.random()*Math.PI*2;
	let spd = Math.random()*max;
	return{x: Math.cos(dir)*spd, y: Math.sin(dir)*spd};
}

function setSize(canv){
	canv.style.width = (innerWidth) + "px";
	canv.style.height = (innerHeight) + "px";
	width = innerWidth;
	height = innerHeight;

	canv.width = innerWidth*window.devicePixelRatio;
	canv.height = innerHeight*window.devicePixelRatio;
	canvas.getContext("2d").scale(window.devicePixelRatio, window.devicePixelRatio);
}

function onClick(e){
	fireworks.push(new Firework(e.clientX));
}

function windowResized(){
	setSize(canvas);
	ctx.fillStyle = "#000000";
	ctx.fillRect(0, 0, width, height);
}