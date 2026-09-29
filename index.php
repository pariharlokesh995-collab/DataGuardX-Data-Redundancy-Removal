<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>DataGuardX | Data Redundancy Removal System</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#050b14;
    color:#f8fafc;
}

/* ================= NAVBAR ================= */

.navbar{
    position:sticky;
    top:0;
    z-index:1000;
    height:75px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 7%;
    background:rgba(5,11,20,.92);
    border-bottom:1px solid #172033;
    backdrop-filter:blur(15px);
}

.logo{
    font-size:25px;
    font-weight:800;
    letter-spacing:.5px;
}

.logo span{
    color:#22d3ee;
}

.nav-links{
    display:flex;
    align-items:center;
    gap:28px;
}

.nav-links a{
    color:#94a3b8;
    text-decoration:none;
    font-size:14px;
    transition:.3s;
}

.nav-links a:hover{
    color:#22d3ee;
}

.dashboard-btn{
    padding:11px 18px;
    background:#0891b2;
    color:white !important;
    border-radius:8px;
}

/* ================= HERO ================= */

.hero{
    min-height:650px;
    padding:90px 7%;
    display:grid;
    grid-template-columns:1.1fr .9fr;
    align-items:center;
    gap:70px;
    background:
    radial-gradient(circle at 15% 20%,rgba(8,145,178,.14),transparent 30%),
    radial-gradient(circle at 85% 50%,rgba(37,99,235,.10),transparent 30%);
}

.badge{
    display:inline-block;
    padding:8px 14px;
    border:1px solid #164e63;
    border-radius:30px;
    color:#22d3ee;
    background:#082f49;
    font-size:12px;
    font-weight:bold;
    margin-bottom:22px;
}

.hero h1{
    font-size:58px;
    line-height:1.05;
    max-width:720px;
    margin-bottom:24px;
}

.hero h1 span{
    color:#22d3ee;
}

.hero-text{
    max-width:650px;
    color:#94a3b8;
    font-size:17px;
    line-height:1.8;
}

.buttons{
    display:flex;
    gap:15px;
    margin-top:32px;
}

.btn{
    text-decoration:none;
    padding:14px 23px;
    border-radius:9px;
    font-weight:bold;
    transition:.3s;
}

.primary{
    background:#0891b2;
    color:white;
}

.primary:hover{
    background:#0e7490;
    transform:translateY(-2px);
}

.secondary{
    border:1px solid #334155;
    color:#e2e8f0;
}

.secondary:hover{
    border-color:#22d3ee;
    color:#22d3ee;
}

/* ================= SYSTEM CARD ================= */

.system-card{
    background:linear-gradient(145deg,#0b1728,#07111f);
    border:1px solid #1e3a56;
    border-radius:22px;
    padding:28px;
    box-shadow:0 25px 70px rgba(0,0,0,.35);
}

.card-top{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
}

.card-title{
    font-weight:bold;
}

.online{
    color:#4ade80;
    font-size:12px;
}

.flow{
    display:flex;
    flex-direction:column;
    gap:10px;
}

.flow-box{
    padding:18px;
    border-radius:11px;
    text-align:center;
    background:#0c2035;
    border:1px solid #164e63;
    color:#cbd5e1;
}

.arrow{
    text-align:center;
    color:#22d3ee;
    font-size:20px;
}

/* ================= STATS ================= */

.stats{
    padding:25px 7% 80px;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:18px;
}

.stat{
    padding:25px;
    background:#0a1423;
    border:1px solid #1e293b;
    border-radius:15px;
    transition:.3s;
}

.stat:hover{
    transform:translateY(-5px);
    border-color:#155e75;
}

.stat-label{
    color:#64748b;
    font-size:12px;
    font-weight:bold;
    letter-spacing:.5px;
}

.stat-value{
    font-size:34px;
    margin-top:12px;
    font-weight:800;
}

.stat-desc{
    color:#475569;
    font-size:12px;
    margin-top:7px;
}

/* ================= SECTION ================= */

.section{
    padding:30px 7% 90px;
}

.section-heading{
    text-align:center;
    margin-bottom:45px;
}

.section-heading h2{
    font-size:35px;
    margin-bottom:12px;
}

.section-heading p{
    color:#64748b;
}

/* ================= VERIFY ================= */

.verify-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:25px;
}

.panel{
    background:#0a1423;
    border:1px solid #1e293b;
    border-radius:18px;
    padding:30px;
}

.panel h2{
    margin-bottom:8px;
}

.panel-subtitle{
    color:#64748b;
    font-size:14px;
    line-height:1.6;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    margin-bottom:8px;
    color:#cbd5e1;
    font-size:13px;
}

.input-group input{
    width:100%;
    padding:14px;
    border-radius:9px;
    border:1px solid #334155;
    background:#050b14;
    color:white;
    outline:none;
    font-size:14px;
}

.input-group input:focus{
    border-color:#22d3ee;
    box-shadow:0 0 0 3px rgba(34,211,238,.08);
}

.submit{
    width:100%;
    border:0;
    padding:15px;
    border-radius:9px;
    background:#0891b2;
    color:white;
    font-size:15px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

.submit:hover{
    background:#0e7490;
}

/* ================= PROCESS ================= */

.process{
    display:flex;
    flex-direction:column;
    gap:22px;
}

.process-item{
    display:flex;
    gap:18px;
}

.number{
    min-width:38px;
    height:38px;
    border-radius:50%;
    background:#083344;
    border:1px solid #155e75;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#22d3ee;
    font-weight:bold;
}

.process-item h3{
    margin-bottom:5px;
}

.process-item p{
    color:#64748b;
    font-size:13px;
    line-height:1.6;
}

/* ================= FEATURES ================= */

.features{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.feature{
    padding:28px;
    background:#0a1423;
    border:1px solid #1e293b;
    border-radius:16px;
    transition:.3s;
}

.feature:hover{
    border-color:#155e75;
    transform:translateY(-5px);
}

.icon{
    width:45px;
    height:45px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#083344;
    color:#22d3ee;
    font-size:20px;
    margin-bottom:18px;
}

.feature h3{
    margin-bottom:10px;
}

.feature p{
    color:#64748b;
    font-size:14px;
    line-height:1.7;
}

/* ================= ARCHITECTURE ================= */

.architecture{
    background:#07111f;
}

.arch-box{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
    align-items:center;
}

.arch-item{
    text-align:center;
    padding:25px 15px;
    border:1px solid #1e3a56;
    background:#0a1728;
    border-radius:13px;
}

.arch-item strong{
    display:block;
    margin-bottom:7px;
}

.arch-item span{
    color:#64748b;
    font-size:12px;
}

/* ================= FOOTER ================= */

footer{
    border-top:1px solid #172033;
    padding:35px 7%;
    text-align:center;
    color:#64748b;
    font-size:13px;
}

.footer-logo{
    font-size:21px;
    font-weight:bold;
    color:white;
    margin-bottom:10px;
}

.footer-logo span{
    color:#22d3ee;
}


/* ================= ANIMATED BACKGROUND PARTICLES ================= */

.particle-field{
    position:fixed;
    inset:0;
    overflow:hidden;
    pointer-events:none;
    z-index:-1;
}

.particle{
    position:absolute;
    width:3px;
    height:3px;
    border-radius:50%;
    background:#22d3ee;
    opacity:.45;
    box-shadow:0 0 10px rgba(34,211,238,.65);
    animation:particleFloat linear infinite;
}

@keyframes particleFloat{
    0%{
        transform:translate3d(0,110vh,0) scale(.7);
        opacity:0;
    }
    15%{
        opacity:.45;
    }
    50%{
        transform:translate3d(var(--drift),45vh,0) scale(1);
        opacity:.7;
    }
    85%{
        opacity:.35;
    }
    100%{
        transform:translate3d(calc(var(--drift) * -1),-10vh,0) scale(.5);
        opacity:0;
    }
}

/* Keep the animated layer subtle behind the interface */
body{
    position:relative;
    isolation:isolate;
}

body::before{
    content:"";
    position:fixed;
    inset:0;
    pointer-events:none;
    z-index:-2;
    background:
        radial-gradient(circle at 20% 20%,rgba(8,145,178,.08),transparent 28%),
        radial-gradient(circle at 80% 70%,rgba(37,99,235,.07),transparent 30%);
}


/* ================= PROFESSIONAL FOOTER ================= */

.site-footer{
    position:relative;
    border-top:1px solid #172033;
    padding:45px 7% 30px;
    text-align:center;
    color:#64748b;
    font-size:13px;
    line-height:1.8;
    background:rgba(5,11,20,.72);
    backdrop-filter:blur(12px);
}

.site-footer .footer-logo{
    margin-bottom:8px;
}

.site-footer strong{
    color:#e2e8f0;
}

.site-footer a{
    color:#22d3ee;
    text-decoration:none;
    transition:.3s;
}

.site-footer a:hover{
    color:#67e8f9;
    text-decoration:underline;
}

.footer-divider{
    width:70px;
    height:2px;
    margin:18px auto;
    background:#155e75;
    border-radius:10px;
}

.footer-project{
    margin-top:10px;
    color:#94a3b8;
}

.footer-copy{
    margin-top:14px;
    color:#475569;
    font-size:12px;
}

/* ================= RESPONSIVE ================= */

@media(max-width:950px){

    .hero{
        grid-template-columns:1fr;
    }

    .stats{
        grid-template-columns:repeat(2,1fr);
    }

    .verify-grid{
        grid-template-columns:1fr;
    }

    .features{
        grid-template-columns:1fr;
    }

    .arch-box{
        grid-template-columns:repeat(2,1fr);
    }

}

@media(max-width:600px){

    .navbar{
        padding:0 5%;
    }

    .nav-links a:not(.dashboard-btn){
        display:none;
    }

    .hero{
        padding:65px 5%;
    }

    .hero h1{
        font-size:40px;
    }

    .stats{
        padding-left:5%;
        padding-right:5%;
        grid-template-columns:1fr;
    }

    .section{
        padding-left:5%;
        padding-right:5%;
    }

    .arch-box{
        grid-template-columns:1fr;
    }

    .buttons{
        flex-direction:column;
    }

    .btn{
        text-align:center;
    }

}

</style>
</head>

<body>

<!-- ANIMATED BACKGROUND PARTICLES -->
<div class="particle-field" id="particleField" aria-hidden="true"></div>

<script>
(function () {
    const field = document.getElementById("particleField");
    const count = window.innerWidth < 600 ? 24 : 48;

    for (let i = 0; i < count; i++) {
        const particle = document.createElement("span");
        particle.className = "particle";

        const size = (Math.random() * 2.5 + 2).toFixed(2);
        const duration = (Math.random() * 12 + 10).toFixed(2);
        const delay = (Math.random() * -18).toFixed(2);
        const drift = (Math.random() * 180 - 90).toFixed(0) + "px";
        const left = (Math.random() * 100).toFixed(2);

        particle.style.width = size + "px";
        particle.style.height = size + "px";
        particle.style.left = left + "%";
        particle.style.animationDuration = duration + "s";
        particle.style.animationDelay = delay + "s";
        particle.style.setProperty("--drift", drift);

        field.appendChild(particle);
    }
})();
</script>


<!-- NAVBAR -->

<nav class="navbar">

    <div class="logo">
        DataGuard<span>X</span>
    </div>

    <div class="nav-links">

        <a href="#home">Home</a>
        <a href="#verify">Verify Data</a>
        <a href="#features">Features</a>
        <a href="dashboard.php" class="dashboard-btn">
            Dashboard
        </a>

    </div>

</nav>


<!-- HERO -->

<section class="hero" id="home">

    <div>

        <div class="badge">
            ● CLOUD DATA VALIDATION SYSTEM
        </div>

        <h1>
            Clean Data.
            <span>Remove Redundancy.</span>
        </h1>

        <p class="hero-text">
            DataGuardX is a cloud-based Data Redundancy Removal System
            that validates incoming records, detects duplicate data
            and helps maintain a clean and reliable database.
        </p>

        <div class="buttons">

            <a href="#verify" class="btn primary">
                Verify New Data
            </a>

            <a href="dashboard.php" class="btn secondary">
                Open Dashboard
            </a>

        </div>

    </div>


    <div class="system-card">

        <div class="card-top">

            <div class="card-title">
                System Architecture
            </div>

            <div class="online">
                ● SYSTEM ONLINE
            </div>

        </div>

        <div class="flow">

            <div class="flow-box">
                👤 User Data
            </div>

            <div class="arrow">↓</div>

            <div class="flow-box">
                🔍 Data Validation
            </div>

            <div class="arrow">↓</div>

            <div class="flow-box">
                🛡 Duplicate Detection
            </div>

            <div class="arrow">↓</div>

            <div class="flow-box">
                ☁ Cloud Database
            </div>

        </div>

    </div>

</section>


<!-- STATS -->

<section class="stats">

    <div class="stat">

        <div class="stat-label">
            DATA RECORDS
        </div>

        <div class="stat-value">
            LIVE
        </div>

        <div class="stat-desc">
            Database monitoring
        </div>

    </div>


    <div class="stat">

        <div class="stat-label">
            DUPLICATE CHECK
        </div>

        <div class="stat-value">
            ON
        </div>

        <div class="stat-desc">
            Automatic validation
        </div>

    </div>


    <div class="stat">

        <div class="stat-label">
            STORAGE
        </div>

        <div class="stat-value">
            CLOUD
        </div>

        <div class="stat-desc">
            MySQL database
        </div>

    </div>


    <div class="stat">

        <div class="stat-label">
            SYSTEM STATUS
        </div>

        <div class="stat-value">
            ●
        </div>

        <div class="stat-desc">
            Operational
        </div>

    </div>

</section>


<!-- VERIFY SECTION -->

<section class="section" id="verify">

    <div class="section-heading">

        <h2>Verify Your Data</h2>

        <p>
            Submit a record and let DataGuardX check for redundancy.
        </p>

    </div>


    <div class="verify-grid">


        <!-- FORM -->

        <div class="panel">

            <h2>Data Verification</h2>

            <p class="panel-subtitle">
                Enter the user's basic information below.
                The system will validate the data and check whether
                the email or phone number already exists.
            </p>


            <form action="check_save.php" method="POST">

                <div class="input-group">

                    <label>FULL NAME</label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Enter full name"
                        required
                    >

                </div>


                <div class="input-group">

                    <label>EMAIL ADDRESS</label>

                    <input
                        type="email"
                        name="email"
                        placeholder="example@email.com"
                        required
                    >

                </div>


                <div class="input-group">

                    <label>PHONE NUMBER</label>

                    <input
                        type="text"
                        name="phone"
                        placeholder="Enter phone number"
                        required
                    >

                </div>


                <button class="submit" type="submit">
                    Verify & Save Record
                </button>

            </form>

        </div>


        <!-- PROCESS -->

        <div class="panel">

            <h2>Verification Process</h2>

            <p class="panel-subtitle">
                DataGuardX follows a simple four-step process.
            </p>


            <div class="process">

                <div class="process-item">

                    <div class="number">01</div>

                    <div>

                        <h3>Input</h3>

                        <p>
                            User submits name, email and phone details.
                        </p>

                    </div>

                </div>


                <div class="process-item">

                    <div class="number">02</div>

                    <div>

                        <h3>Validation</h3>

                        <p>
                            Submitted information is checked for valid format.
                        </p>

                    </div>

                </div>


                <div class="process-item">

                    <div class="number">03</div>

                    <div>

                        <h3>Duplicate Detection</h3>

                        <p>
                            Existing records are checked using email and phone.
                        </p>

                    </div>

                </div>


                <div class="process-item">

                    <div class="number">04</div>

                    <div>

                        <h3>Storage</h3>

                        <p>
                            Only verified unique records are stored in the
                            main database.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- FEATURES -->

<section class="section" id="features">

    <div class="section-heading">

        <h2>System Features</h2>

        <p>
            Core capabilities of the Data Redundancy Removal System.
        </p>

    </div>


    <div class="features">


        <div class="feature">

            <div class="icon">🔍</div>

            <h3>Duplicate Detection</h3>

            <p>
                Automatically compares submitted information with
                existing records to identify redundant data.
            </p>

        </div>


        <div class="feature">

            <div class="icon">✓</div>

            <h3>Data Validation</h3>

            <p>
                Checks user input before allowing information to
                enter the database.
            </p>

        </div>


        <div class="feature">

            <div class="icon">☁</div>

            <h3>Cloud Database</h3>

            <p>
                Designed to work with a cloud-hosted MySQL database
                for online data storage.
            </p>

        </div>


        <div class="feature">

            <div class="icon">🛡</div>

            <h3>Redundancy Prevention</h3>

            <p>
                Duplicate submissions are prevented from being stored
                as new unique records.
            </p>

        </div>


        <div class="feature">

            <div class="icon">📊</div>

            <h3>Dashboard</h3>

            <p>
                The dashboard provides a centralized view of stored
                records and system information.
            </p>

        </div>


        <div class="feature">

            <div class="icon">⚡</div>

            <h3>Fast Processing</h3>

            <p>
                Records are checked automatically before database
                insertion.
            </p>

        </div>

    </div>

</section>


<!-- ARCHITECTURE -->

<section class="section architecture">

    <div class="section-heading">

        <h2>Data Flow</h2>

        <p>
            How a record moves through the system.
        </p>

    </div>


    <div class="arch-box">

        <div class="arch-item">

            <strong>1. User</strong>

            <span>Submits data</span>

        </div>


        <div class="arch-item">

            <strong>2. Validation</strong>

            <span>Checks input</span>

        </div>


        <div class="arch-item">

            <strong>3. Detection</strong>

            <span>Finds duplicates</span>

        </div>


        <div class="arch-item">

            <strong>4. Database</strong>

            <span>Stores unique data</span>

        </div>

    </div>

</section>


<!-- FOOTER -->

<footer class="site-footer">

    <div class="footer-logo">
        DataGuard<span>X</span>
    </div>

    <p>
        Data Redundancy Removal System
    </p>

    <div class="footer-divider"></div>

    <p>
        Developed by: <strong>Bhagat Sen</strong>
    </p>

    <p>
        Email: <a href="mailto:Bhagatsen20@gmail.com">Bhagatsen20@gmail.com</a>
    </p>

    <p class="footer-project">
        CodeAlpha Cloud Computing Internship — Task 1
    </p>

    <p class="footer-copy">
        © 2026 DataGuardX. All rights reserved.
    </p>

</footer>

</body>

</html>