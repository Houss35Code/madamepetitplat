import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Éditeur de menus
window.menuEditor = function(initialData) {
    return {
        courses: initialData.length ? initialData : [{ label: '', plats: [''] }],

        addCourse() {
            this.courses.push({ label: '', plats: [''] });
        },

        removeCourse(ci) {
            this.courses.splice(ci, 1);
        },

        addPlat(ci) {
            this.courses[ci].plats.push('');
        },

        removePlat(ci, pi) {
            this.courses[ci].plats.splice(pi, 1);
        },

        serialize() {
            const payload = this.courses
                .filter(c => c.label.trim())
                .map(c => ({
                    label: c.label.trim(),
                    plats: c.plats.map(p => p.trim()).filter(Boolean),
                }));
            this.$refs.contenuJson.value = JSON.stringify(payload);
            this.$refs.contenuJson.closest('form').submit();
        },
    };
};

Alpine.start();


// Animations fade-up
const observer = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
        if (e.isIntersecting) {
            setTimeout(() => e.target.classList.add('visible'), i * 90);
            observer.unobserve(e.target);
        }
    });
}, { threshold: 0.08 });

document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

// Nav scroll
window.addEventListener('scroll', () => {
    document.getElementById('navbar')?.classList.toggle('scrolled', window.scrollY > 20);
});

// Hamburger mobile
document.getElementById('hamburger')?.addEventListener('click', function () {
    const expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', !expanded);
    document.getElementById('navLinks').classList.toggle('open');
});

// Scroll automatique vers le formulaire de contact après soumission (succès ou erreur)
document.addEventListener('DOMContentLoaded', () => {
    const feedback = document.querySelector('.form-success, .form-errors');
    if (feedback) {
        document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
});