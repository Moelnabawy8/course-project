<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سيرة ذاتية | اسمك</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        header {
            display: flex;
            padding: 30px;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            color: white;
        }
        
        .profile {
            flex: 1;
            text-align: center;
        }
        
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            margin-bottom: 15px;
        }
        
        .profile h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .profile .title {
            font-size: 18px;
            opacity: 0.9;
        }
        
        .contact-info {
            flex: 1;
            padding-right: 20px;
        }
        
        .contact-info ul {
            list-style: none;
        }
        
        .contact-info li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .contact-info i {
            margin-left: 10px;
            width: 20px;
            text-align: center;
        }
        
        main {
            padding: 30px;
        }
        
        .section {
            margin-bottom: 30px;
        }
        
        .section h2 {
            font-size: 22px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            color: #6e48aa;
            display: flex;
            align-items: center;
        }
        
        .section h2 i {
            margin-left: 10px;
        }
        
        .item {
            margin-bottom: 20px;
        }
        
        .item h3 {
            font-size: 18px;
            color: #333;
        }
        
        .item .meta {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }
        
        .item ul {
            padding-right: 20px;
        }
        
        .item li {
            margin-bottom: 5px;
        }
        
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .skills span {
            background: #f0f0f0;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }
            
            .contact-info {
                padding-right: 0;
                margin-top: 20px;
            }
            
            .contact-info ul {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }
            
            .contact-info li {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="profile">
                <img src="https://via.placeholder.com/150" alt="صورة شخصية" class="profile-img">
                <h1>سارة أحمد</h1>
                <p class="title">أخصائية تسويق رقمي</p>
            </div>
            <div class="contact-info">
                <ul>
                    <li><i class="fas fa-phone"></i> +966 50 123 4567</li>
                    <li><i class="fas fa-envelope"></i> sara@example.com</li>
                    <li><i class="fab fa-linkedin"></i> linkedin.com/in/sara-ahmed</li>
                    <li><i class="fas fa-map-marker-alt"></i> الرياض، السعودية</li>
                </ul>
            </div>
        </header>

        <main>
            <section class="section">
                <h2><i class="fas fa-user"></i> الملف الشخصي</h2>
                <p>أخصائية تسويق رقمي بخبرة 5 سنوات في إدارة الحملات الإعلانية وتحليل البيانات، متخصصة في تحسين معدلات التحويل وبناء الاستراتيجيات التسويقية. أسعى لتوظيف مهاراتي في بيئة ديناميكية تعتمد على الابتكار.</p>
            </section>

            <section class="section">
                <h2><i class="fas fa-briefcase"></i> الخبرة العملية</h2>
                <div class="item">
                    <h3>أخصائية تسويق رقمي</h3>
                    <p class="meta">شركة التقنية المتقدمة | 2020 - 2023</p>
                    <ul>
                        <li>إدارة حملات إعلانية زادت من معدل التحويل بنسبة 30%.</li>
                        <li>تحليل بيانات السوق وتقديم تقارير شهرية للإدارة.</li>
                        <li>إدارة فريق تسويق مكون من 5 أفراد.</li>
                    </ul>
                </div>
                <div class="item">
                    <h3>منسقة تسويق</h3>
                    <p class="meta">شركة الإبداع الرقمي | 2018 - 2020</p>
                    <ul>
                        <li>تطوير استراتيجيات تسويقية جديدة.</li>
                        <li>إدارة حسابات التواصل الاجتماعي.</li>
                    </ul>
                </div>
            </section>

            <section class="section">
                <h2><i class="fas fa-graduation-cap"></i> التعليم</h2>
                <div class="item">
                    <h3>بكالوريوس في التسويق</h3>
                    <p class="meta">جامعة الملك سعود | 2014 - 2018</p>
                    <ul>
                        <li>تخرجت بامتياز مع مرتبة الشرف</li>
                    </ul>
                </div>
            </section>

            <section class="section">
                <h2><i class="fas fa-cogs"></i> المهارات</h2>
                <div class="skills">
                    <span>إدارة وسائل التواصل الاجتماعي</span>
                    <span>تحليل البيانات</span>
                    <span>التصميم الجرافيكي</span>
                    <span>إدارة المشاريع</span>
                    <span>اللغة الإنجليزية</span>
                    <span>Google Analytics</span>
                    <span>Facebook Ads</span>
                    <span>SEO</span>
                </div>
            </section>

            <section class="section">
                <h2><i class="fas fa-certificate"></i> الشهادات</h2>
                <div class="item">
                    <h3>شهادة Google Ads</h3>
                    <p class="meta">Google | 2021</p>
                </div>
                <div class="item">
                    <h3>شهادة التسويق الرقمي</h3>
                    <p class="meta">Coursera | 2020</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>