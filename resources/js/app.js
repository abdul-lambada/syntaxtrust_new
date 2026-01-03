import './bootstrap';

/**
 * SyntaxTrust Interactive Components
 * Built with Alpine.js
 * Merged from inline scripts and optimized.
 */

// Scroll Reveal Observer
document.addEventListener('DOMContentLoaded', () => {
    if (!('IntersectionObserver' in window)) return;
    if (window.__revealObserver) window.__revealObserver.disconnect();

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                requestAnimationFrame(() => {
                    entry.target.classList.add('reveal-show');
                });
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.01, rootMargin: '30px' });

    window.__revealObserver = observer;
    document.querySelectorAll('[data-reveal]').forEach(el => observer.observe(el));
});

// Tilt Card Controller
window.tiltCard = function () {
    return {
        rotationX: 0,
        rotationY: 0,
        cardStyle: 'transform: rotateX(0deg) rotateY(0deg);',
        move(event) {
            if (window.innerWidth < 768) return; // Disable on mobile
            const bounds = event.currentTarget.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height / 2;
            const maxTilt = 10; // Slight reduction
            const percentX = (event.clientX - centerX) / (bounds.width / 2);
            const percentY = (event.clientY - centerY) / (bounds.height / 2);
            this.rotationY = Math.max(-maxTilt, Math.min(maxTilt, percentX * maxTilt));
            this.rotationX = Math.max(-maxTilt, Math.min(maxTilt, -percentY * maxTilt));
            this.updateStyle();
        },
        reset() {
            this.rotationX = 0;
            this.rotationY = 0;
            this.updateStyle();
        },
        updateStyle() {
            requestAnimationFrame(() => {
                this.cardStyle = `transform: rotateX(${this.rotationX}deg) rotateY(${this.rotationY}deg);`;
            });
        }
    };
}

// Micro Typewriter
window.microTypewriter = function (lines = []) {
    return {
        lines: Array.isArray(lines) ? lines : [],
        index: 0,
        display: '',
        typing: null,
        pausing: null,
        init() {
            if (!this.lines.length) return;
            this.typeLine();
        },
        nextLine() {
            if (!this.lines.length) return;
            this.index = (this.index + 1) % this.lines.length;
            this.typeLine();
        },
        typeLine() {
            clearTimeout(this.typing);
            clearTimeout(this.pausing);
            const text = this.lines[this.index] || '';
            const step = (pos) => {
                if (pos <= text.length) {
                    this.display = text.slice(0, pos);
                    this.typing = setTimeout(() => step(pos + 1), 50);
                } else {
                    this.pausing = setTimeout(() => this.erase(text.length), 2000);
                }
            };
            step(0);
        },
        erase(pos) {
            clearTimeout(this.typing);
            if (pos >= 0) {
                const text = (this.lines[this.index] || '').slice(0, pos);
                this.display = text;
                this.typing = setTimeout(() => this.erase(pos - 1), 30);
            } else {
                this.nextLine();
            }
        }
    };
}

// Stat Counter
window.statCounter = function ({ start = 0, end = 0, duration = 1000, suffix = '' } = {}) {
    return {
        value: start,
        end,
        suffix,
        duration,
        animate: false,
        start() {
            if (this.animate) return;
            const range = this.end - this.value;
            const steps = Math.max(1, Math.round(this.duration / 30));
            const increment = range / steps;
            let currentStep = 0;
            const tick = () => {
                currentStep++;
                this.value += increment;
                if (currentStep < steps) {
                    requestAnimationFrame(tick);
                } else {
                    this.value = this.end;
                }
            };
            this.animate = true;
            requestAnimationFrame(tick);
        },
        formatted() {
            return `${Math.round(this.value)}${this.suffix}`;
        }
    };
}

// Hero Theme Controller
window.heroTheme = function () {
    return {
        theme: localStorage.getItem('theme') || 'day',
        particles: [],
        _initiated: false,

        init() {
            if (this._initiated) return;
            this._initiated = true;
            const saved = localStorage.getItem('theme');
            if (saved) this.theme = saved;

            setTimeout(() => {
                this.applyTheme();
                this.initParticles();
            }, 50);
        },

        initParticles() {
            const count = window.innerWidth < 768 ? 8 : 15;
            this.particles = Array.from({ length: count }, (_, i) => ({
                id: i,
                x: Math.random() * 100,
                y: Math.random() * 100,
                size: Math.random() * 4 + 2,
                duration: Math.random() * 10 + 20, // Slow
                delay: Math.random() * -20
            }));
        },

        toggle() {
            this.theme = this.theme === 'day' ? 'night' : 'day';
            localStorage.setItem('theme', this.theme);
            this.applyTheme();
        },

        applyTheme() {
            const isNight = this.theme === 'night';
            document.body.classList.toggle('theme-night', isNight);
            document.documentElement.classList.toggle('dark', isNight);
        },

        particleStyle(p) {
            return `left:${p.x}%;top:${p.y}%;width:${p.size}px;height:${p.size}px;animation-duration:${p.duration}s`;
        }
    }
}

// Testimonial Carousel
window.testimonialCarousel = function (initial = []) {
    return {
        items: Array.isArray(initial) ? initial : [],
        index: 0,
        progress: 0,
        duration: 6000,
        timer: null,
        progressRaf: null,
        parallaxRefs: {},
        parallaxStyles: {},

        init() {
            if (this.items.length > 0) {
                this.resume();
            }
        },
        resume() {
            if (this.items.length <= 1) return;
            this.startProgressLoop();
            this.timer = setInterval(() => this.next(), this.duration);
        },
        stop() {
            if (this.timer) clearInterval(this.timer);
            if (this.progressRaf) cancelAnimationFrame(this.progressRaf);
            this.timer = null;
            this.progressRaf = null;
        },
        startProgressLoop() {
            if (this.progressRaf) cancelAnimationFrame(this.progressRaf);
            let last = performance.now();
            const tick = (now) => {
                if (!this.timer) return;
                const delta = now - last;
                last = now;
                this.progress = (this.progress + (delta / this.duration) * 100) % 100;
                this.progressRaf = requestAnimationFrame(tick);
            };
            this.progressRaf = requestAnimationFrame(tick);
        },
        next() {
            this.index = (this.index + 1) % this.items.length;
            this.resetCycle();
        },
        resetCycle() {
            this.stop();
            this.progress = 0;
            this.resume();
        },
        // Parallax simplified for performance
        observe(el) { },
        titleStyle(idx) { return ''; },
        quoteStyle(idx) { return ''; }
    };
}

// Tech Carousel
window.techCarousel = function () {
    return {
        interval: null,
        init() {
            this.startAutoScroll();
        },
        scroll(direction) {
            const track = this.$refs.inner;
            if (!track) return;
            const scrollAmount = 300;
            track.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        },
        pause() { clearInterval(this.interval); },
        startAutoScroll() {
            this.pause();
            this.interval = setInterval(() => {
                const track = this.$refs.inner;
                if (!track) return;
                if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 50) {
                    track.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    this.scroll(1);
                }
            }, 5000);
        }
    }
}

// Typewriter Card
window.typewriterCard = function () {
    return {
        items: [
            { label: 'Tugas Kuliah', title: 'Bantuan Skripsi & IT', subtitle: 'Code rapi, siap demo.', emoji: '🎓', tagline: 'Student Friendly' },
            { label: 'UMKM', title: 'Landing Page Premium', subtitle: 'Website jualan 24 jam.', emoji: '🚀', tagline: 'High Conversion' },
            { label: 'System', title: 'Aplikasi Web Kompleks', subtitle: 'Sesuai alur bisnis Anda.', emoji: '⚙️', tagline: 'Enterprise' },
            { label: 'Fix', title: 'Maintenance & Update', subtitle: 'Perbaikan error cepat.', emoji: '🔧', tagline: 'Support' }
        ],
        index: 0,
        current: null,
        displayText: '',
        isDeleting: false,
        timeout: null,
        init() {
            this.current = this.items[0];
            this.type();
        },
        select(i) {
            this.index = i;
            this.current = this.items[i];
            this.isDeleting = false;
            this.displayText = '';
            clearTimeout(this.timeout);
            this.type();
        },
        next() { this.select((this.index + 1) % this.items.length); },
        prev() { this.select((this.index - 1 + this.items.length) % this.items.length); },
        type() {
            const fullText = this.current.title;
            const speed = this.isDeleting ? 50 : 100;

            if (this.isDeleting) {
                this.displayText = fullText.substring(0, this.displayText.length - 1);
            } else {
                this.displayText = fullText.substring(0, this.displayText.length + 1);
            }

            let nextSpeed = speed;
            if (!this.isDeleting && this.displayText === fullText) {
                nextSpeed = 3000;
                this.isDeleting = true;
            } else if (this.isDeleting && this.displayText === '') {
                this.isDeleting = false;
                this.index = (this.index + 1) % this.items.length;
                this.current = this.items[this.index];
                nextSpeed = 500;
            }
            this.timeout = setTimeout(() => this.type(), nextSpeed);
        }
    }
}
