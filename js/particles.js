
function Particle() {
	this.path = 'images/';
	this.images = ['main-particle1.png', 'main-particle2.png', 'main-particle3.png', 'main-particle4.png'];
	
//	Randomly Pick a Particle Model
	this.image = this.images[randomInt(this.images.length)];
	this.file = this.path + this.image;
	
//	Create a Particle DOM
	this.element = document.createElement('img');
	
	this.speed().newPoint().display().newPoint().fly();
};

//	Generate Random Speed
Particle.prototype.speed = function() {
	this.duration = (randomInt(10) + 5) * 1100;
	
	return this;
};

//	Generate a Random Position
Particle.prototype.newPoint = function() {
	this.pointX = randomInt(window.innerWidth - 100);
	this.pointY = randomInt(window.innerHeight - 100);
	
	return this;
};

//	Display the Particle
Particle.prototype.display = function() {
	$(this.element)
		.attr('src', this.file)
		.css('position', 'fixed')
		.css('pointer-events', 'none')
		.css('top', this.pointY)
		.css('left', this.pointX);
	$(document.body).append(this.element);
	
	return this;
};

//	Animate Particle Movements
Particle.prototype.fly = function() {
	var self = this;
	$(this.element).animate({
		"top": this.pointY,
		"left": this.pointX,
	}, this.duration, 'linear', function(){
		self.speed().newPoint().fly();
	});
};

function randomInt(max) {
//	Generate a random integer (0 <= randomInt < max)
	return Math.floor(Math.random() * max);
}

$(function(){
	var total = 30;
	var particles = [];
	
	for (i = 0; i < total; i++){
		particles[i] = new Particle();
	}
});