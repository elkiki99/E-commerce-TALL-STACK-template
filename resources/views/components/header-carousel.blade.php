<div x-data="{            
    autoplayIntervalTime: 4000,
    slides: [                
        {
            imgSrc: '{{ asset("storage/img/welcome2.webp") }}',
            imgAlt: 'Image of athletes in action, showcasing our latest sports gear.',  
            title: 'Sports Gear for Champions',
            description: 'Explore our premium collection of sports equipment and apparel.',           
        },                
        {                    
            imgSrc: '{{ asset("storage/img/welcome2.webp") }}',                    
            imgAlt: 'Image of a high-performance running shoe in motion.',  
            title: 'Unleash Your Potential',
            description: 'Gear up with the latest technology for your best performance yet.',            
        },                
        {                    
            imgSrc: '{{ asset("storage/img/welcome2.webp") }}',                   
            imgAlt: 'Image of a sleek sports watch with advanced features.',    
            title: 'Elevate Your Game',
            description: 'Achieve greatness with our cutting-edge sports accessories.',       
        },            
    ],           
    currentSlideIndex: 1,
    isPaused: false,
    autoplayInterval: null,
    previous() {                
        if (this.currentSlideIndex > 1) {                    
            this.currentSlideIndex = this.currentSlideIndex - 1                
        } else {   
            // If it's the first slide, go to the last slide           
            this.currentSlideIndex = this.slides.length                
        }            
    },            
    next() {                
        if (this.currentSlideIndex < this.slides.length) {                    
            this.currentSlideIndex = this.currentSlideIndex + 1                
        } else {                 
            // If it's the last slide, go to the first slide    
            this.currentSlideIndex = 1                
        }            
    },    
    autoplay() {
        this.autoplayInterval = setInterval(() => {
            if (! this.isPaused) {
                this.next()
            }
        }, this.autoplayIntervalTime)
    },
    setAutoplayInterval(newIntervalTime) {
        clearInterval(this.autoplayInterval)
        this.autoplayIntervalTime = newIntervalTime
        this.autoplay()
    },    
}" x-init="autoplay" class="relative w-full overflow-hidden">
   
    <!-- Slides -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative min-h-[60svh] w-full">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                
                <!-- Title And Description -->
                <div class="absolute inset-0 z-10 flex flex-col items-center justify-center gap-4 px-6 text-center text-white lg:px-32">
                    <h3 class="text-4xl font-bold lg:text-5xl" x-text="slide.title"></h3>
                    <p class="text-lg lg:text-xl" x-text="slide.description"></p>
                </div>

                <img class="absolute inset-0 object-cover w-full h-full text-slate-700 dark:text-slate-300" x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
            </div>
        </template>
    </div>
    
    <!-- Pause/Play Button -->
    <button type="button" class="absolute z-20 transition rounded-full opacity-50 bottom-5 right-5 text-slate-300 hover:opacity-80 focus-visible:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 active:outline-offset-0" aria-label="pause carousel" x-on:click="(isPaused = !isPaused), setAutoplayInterval(autoplayIntervalTime)" x-bind:aria-pressed="isPaused">
        <svg x-cloak x-show="isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-7">
            <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd">
        </svg>
        <svg x-cloak x-show="!isPaused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-7">
            <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm5-2.25A.75.75 0 0 1 7.75 7h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Zm4 0a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Z" clip-rule="evenodd">
        </svg>
    </button>
    
    <!-- Indicators -->
    <div class="absolute rounded-xl bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2" role="group" aria-label="slides" >
        <template x-for="(slide, index) in slides">
            <button class="transition rounded-full cursor-pointer size-2" x-on:click="(currentSlideIndex = index + 1), setAutoplayInterval(autoplayIntervalTime)" x-bind:class="[currentSlideIndex === index + 1 ? 'bg-slate-300' : 'bg-slate-300/50']" x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>