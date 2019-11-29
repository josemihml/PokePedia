(function() {
    //
    // Setup
    //
    var width = document.documentElement.clientWidth,
        height = document.documentElement.clientHeight;
    
    var pink = 'rgba(252, 113, 123, 1)',
        green = 'rgba(53, 212, 164, 1)',
        blue = 'rgba(90, 232, 255, 1)',
        silver = 'rgba(154, 194, 197, 1)';
    
    var config = {
        colors        : [pink, green, blue],
        maxSize       : 2,
        velocity      : 0.4,
        density       : 1000
    };
    
    //
    // Dot Class
    //
    class Dot {
        constructor(options) {
            this.canvas = options.canvas;
            this.ctx = options.ctx;
            
            this.color = options.color;
            this.size = options.size;
            
            this.x = options.x;
            this.y = options.y;
            this.velocity = {
                x: (Math.random() * options.velocity) - options.velocity / 2,
                y: (Math.random() * options.velocity) - options.velocity / 2
            };
        }
        
        draw() {
            this.ctx.fillStyle = this.color;
            this.ctx.beginPath();
            this.ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI, false);
            this.ctx.fill();
            this.ctx.closePath();
        }
        
        update() {
            // Change direction if outside the bounds of the canvas
            if (this.x > this.canvas.width + this.size || this.x < -this.size) {
                this.velocity.x = -this.velocity.x;
            }
            
            if (this.y > this.canvas.height + this.size || this.y < - this.size) {
                this.velocity.y = - this.velocity.y;
            }
            
            // Update the position of the dot
            this.x += this.velocity.x;
            this.y += this.velocity.y;
        }
    }

    //
    // Canvas class
    //
    class ParticleCanvas {
        constructor(element, config) {
            this.canvas   = element;
            this.context  = element.getContext('2d');
            
            this.dots     = [];
            this.maxSize  = config.maxSize;
            this.colors   = config.colors;
            
            this.velocity = config.velocity;
            this.density  = config.density;
            
            // Redraw the canvas when the user resizes the screen
            window.addEventListener('resize', debounce(this.init, 300).bind(this));

            this.init();
        }

        init() {
            this.clear();
            this.resize();

            this.createDots();
            this.drawDots();
            
            // Animate the dots
            requestAnimationFrame(this.update.bind(this));
        }

        resize() {
            this.canvas.width  = window.innerWidth;
            this.canvas.height = window.innerHeight;
        }

        clear() {
            this.dots = [];
            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        }
        
        update() {
            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
            
            var i = this.dots.length;
            
            while(i--) {
                this.dots[i].update();
                this.dots[i].draw();
            }
            
            this.animationFrame = window.requestAnimationFrame(() => this.update());
        }
        
        createDots() {
            for (var i = 0; i < this.canvas.width * this.canvas.height / this.density; i++) {
                var pos     = this.getRandomPosition(),
                    color   = this.getRandomColor(),
                    size    = this.getRandomSize(),
                    opacity = this.getOpacity(),
                    rgba    = this.setOpacity(color, opacity);

                var dot = new Dot({
                    canvas  : this.canvas,
                    ctx     : this.context,
                    color   : rgba,
                    size    : size,
                    x       : pos.x,
                    y       : pos.y,
                    velocity: this.velocity
                });

                this.dots.push(dot);
            }
        }

        drawDots() {
            var i = this.dots.length;

            while (i--) {
                this.dots[i].draw();
            }
        }
      
        getRandomPosition() {
            return {
                x: Math.floor(Math.random() * (this.canvas.width + 1)),
                y: Math.floor(Math.random() * (this.canvas.height + 1))
            };
        }

        getRandomColor() {
            return this.colors[Math.floor(Math.random() * (this.colors.length))];
        }

        getRandomSize() {
            return Math.floor(Math.random() * (this.maxSize + 1));
        }

        getOpacity() {
            return (Math.random().toFixed(2)).toString();
        }

        // Replace the opacity value in the rgba colour
        setOpacity(color, opacity) {
            var index = color.lastIndexOf('1');
            return color.substr(0, index) + opacity + color.substr(index + 1, color.length);
        }
    }

    var canvas = new ParticleCanvas(document.getElementById('canvas'), config);
    
    //
    // High-density screens
    //
    if (window.devicePixelRatio > 1) {
        var canvasWidth = canvas.width;
        var canvasHeight = canvas.height;

        canvas.width = canvasWidth * window.devicePixelRatio;
        canvas.height = canvasHeight * window.devicePixelRatio;
        canvas.style.width = canvasWidth;
        canvas.style.height = canvasHeight;

        canvas.context.scale(window.devicePixelRatio, window.devicePixelRatio);
    }
    
    
    function debounce(func, wait, immediate) {
    	var timeout;
    	return function() {
    		var context = this, args = arguments;
    		var later = function() {
    			timeout = null;
    			if (!immediate) func.apply(context, args);
    		};
    		var callNow = immediate && !timeout;
    		clearTimeout(timeout);
    		timeout = setTimeout(later, wait);
    		if (callNow) func.apply(context, args);
    	};
};
})();