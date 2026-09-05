<?php
// Numbers Config
$dev_whatsapp = "213552048599";
$design_whatsapp = "213697242171";

$service_requested = isset($_GET['service']) ? $_GET['service'] : 'dev';

if ($service_requested == 'design') {
    $target_whatsapp = $design_whatsapp;
    $service_name = "التصميم الجرافيكي (Graphic Design)";
    $badge_icon = "fa-pen-nib";
    $badge_tag = "UI/UX";
    $accent = "copper";
} else {
    $target_whatsapp = $dev_whatsapp;
    $service_name = "تطوير الويب (Web Development)";
    $badge_icon = "fa-laptop-code";
    $badge_tag = "DEV";
    $accent = "steel";
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الطلب | <?= $service_name ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        tajawal: ['Tajawal', 'sans-serif'],
                        mono: ['"IBM Plex Mono"', 'monospace'],
                    },
                    colors: {
                        paper: { DEFAULT: '#E7EDF1', panel: '#F4F8FA' },
                        ink: { DEFAULT: '#16202B', soft: '#526270', dsoft: '#92A2AF' },
                        steel: { DEFAULT: '#2F5D8C', dark: '#6FA0D0' },
                        copper: { DEFAULT: '#B5602B', dark: '#D9824C' },
                        whatsapp: { 500: '#25D366', 600: '#1da851' },
                    },
                    borderRadius: { sm: '3px' },
                }
            }
        }
    </script>
    <style>
        html.dark { color-scheme: dark; }
        body { font-family: 'Tajawal', sans-serif; }
        .mono { font-family: 'IBM Plex Mono', monospace; direction: ltr; unicode-bidi: isolate; }
        
        }
        .dark .grid-paper {
            background-image:
                linear-gradient(rgba(231,237,241,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(231,237,241,0.06) 1px, transparent 1px);
        }
        :focus-visible { outline: 2px solid #B5602B; outline-offset: 3px; }
    </style>
</head>
<body class="bg-paper dark:bg-ink text-ink dark:text-paper min-h-screen flex items-center justify-center p-4 grid-paper transition-colors duration-300">

    <div class="w-full max-w-lg bg-paper-panel dark:bg-ink border border-ink/15 dark:border-paper/15 rounded-sm p-6 sm:p-10">

        <!-- Header -->
        <header class="text-center mb-8">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-9 h-9 border border-<?= $accent ?> text-<?= $accent ?> dark:text-<?= $accent ?>-dark rounded-sm flex items-center justify-center text-sm">
                    <i class="fa-solid <?= $badge_icon ?>"></i>
                </span>
                <span class="mono text-[11px] text-ink-soft dark:text-ink-dsoft tracking-wide"><?= $badge_tag ?></span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold"><?= $service_name ?></h1>
            <p class="text-sm text-ink-soft dark:text-ink-dsoft mt-2">أدخل تفاصيل مشروعك، وسيتم توجيهك مباشرة للمحادثة عبر واتساب</p>
        </header>

        <!-- Form -->
        <form id="orderForm" onsubmit="submitToWhatsapp(event)" class="space-y-5">

            <input type="hidden" id="targetWhatsapp" value="<?= $target_whatsapp ?>">
            <input type="hidden" id="serviceName" value="<?= $service_name ?>">

            <div>
                <label for="fname" class="block text-sm font-bold text-ink-soft dark:text-ink-dsoft mb-1.5">الاسم واللقب</label>
                <div class="relative">
                    <input type="text" id="fname" 
                        class="w-full px-4 py-3.5 pl-10 rounded-sm border border-ink/20 dark:border-paper/20 bg-paper dark:bg-ink text-ink dark:text-paper focus:ring-2 focus:ring-<?= $accent ?> focus:border-<?= $accent ?> outline-none transition-all">
                    <i class="fa-solid fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-ink-soft/60 dark:text-ink-dsoft/60"></i>
                </div>
            </div>

            <div>
                <label for="phone" class="block text-sm font-bold text-ink-soft dark:text-ink-dsoft mb-1.5">رقم الهاتف</label>
                <div class="relative">
                    <input type="tel" id="phone" required placeholder="06XXXXXXXX" dir="ltr"
                        class="w-full px-4 py-3.5 pl-10 rounded-sm border border-ink/20 dark:border-paper/20 bg-paper dark:bg-ink text-ink dark:text-paper focus:ring-2 focus:ring-<?= $accent ?> focus:border-<?= $accent ?> outline-none transition-all text-right">
                    <i class="fa-solid fa-phone absolute left-3.5 top-1/2 -translate-y-1/2 text-ink-soft/60 dark:text-ink-dsoft/60"></i>
                </div>
            </div>

            <div>
                <label for="goal" class="block text-sm font-bold text-ink-soft dark:text-ink-dsoft mb-1.5">تفاصيل المشروع / الهدف</label>
                <textarea id="goal" required rows="4" placeholder="اشرح لنا فكرة مشروعك والمتطلبات الأساسية..."
                    class="w-full px-4 py-3.5 rounded-sm border border-ink/20 dark:border-paper/20 bg-paper dark:bg-ink text-ink dark:text-paper focus:ring-2 focus:ring-<?= $accent ?> focus:border-<?= $accent ?> outline-none transition-all resize-none"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-whatsapp-500 hover:bg-whatsapp-600 text-white font-bold py-4 px-6 rounded-sm flex items-center justify-center gap-3 text-lg transition-colors active:scale-[0.98]">
                <i class="fa-brands fa-whatsapp text-2xl"></i>
                <span>متابعة على واتساب</span>
            </button>
        </form>

        <footer class="mt-6 text-center">
            <a href="index.php" class="inline-flex items-center gap-2 text-sm text-ink-soft dark:text-ink-dsoft hover:text-ink dark:hover:text-paper transition-colors">
                <i class="fa-solid fa-arrow-right"></i>
                <span>العودة للرئيسية</span>
            </a>
        </footer>
    </div>

    <script>
        // Match the theme chosen on the homepage
        const stored = localStorage.getItem('wajiha-theme');
        if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        function submitToWhatsapp(event) {
            event.preventDefault();
            const phone = document.getElementById('targetWhatsapp').value;
            const service = document.getElementById('serviceName').value;
            const fname = document.getElementById('fname').value.trim();
            const userPhone = document.getElementById('phone').value.trim();
            const goal = document.getElementById('goal').value.trim();

            const message =
                `مرحباً، أرغب في طلب خدمة: ${service}\n` +
                `الاسم: ${fname}\n` +
                `رقم الهاتف: ${userPhone}\n` +
                `تفاصيل المشروع: ${goal}`;

            const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
            window.open(url, '_blank');
        }
    </script>
</body>
</html>