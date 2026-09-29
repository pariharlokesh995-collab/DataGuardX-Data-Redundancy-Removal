<?php

require "db_connect.php";

/*
|--------------------------------------------------------------------------
| DataGuard Advanced Dashboard
|--------------------------------------------------------------------------
*/


// =====================================================
// STATISTICS
// =====================================================

$totalUnique = 0;
$totalDuplicates = 0;
$totalRecords = 0;
$uniquenessRate = 100;


// Unique records
$resultUnique = $conn->query(
    "SELECT COUNT(*) AS c FROM users"
);

if ($resultUnique) {
    $totalUnique = (int)$resultUnique->fetch_assoc()['c'];
}


// Duplicate records
$resultDuplicate = $conn->query(
    "SELECT COUNT(*) AS c FROM duplicate_log"
);

if ($resultDuplicate) {
    $totalDuplicates = (int)$resultDuplicate->fetch_assoc()['c'];
}


// Total attempts
$totalRecords = $totalUnique + $totalDuplicates;


// Uniqueness percentage
if ($totalRecords > 0) {
    $uniquenessRate = round(
        ($totalUnique / $totalRecords) * 100
    );
}


// =====================================================
// SEARCH
// =====================================================

$search = trim($_GET['search'] ?? '');

if ($search !== '') {

    $safeSearch = $conn->real_escape_string($search);

    $records = $conn->query("
        SELECT *
        FROM users
        WHERE
            name LIKE '%$safeSearch%'
            OR email LIKE '%$safeSearch%'
            OR phone LIKE '%$safeSearch%'
        ORDER BY id DESC
    ");

} else {

    $records = $conn->query("
        SELECT *
        FROM users
        ORDER BY id DESC
    ");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>DataGuard | Advanced Dashboard</title>


<style>

/* =====================================================
   RESET
===================================================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:
        Inter,
        Segoe UI,
        Arial,
        sans-serif;
}




/* =====================================================
   ADVANCED ANIMATED PARTICLE BACKGROUND
   ===================================================== */

body{
    position:relative;
    isolation:isolate;
}

.particle-field{
    position:fixed;
    inset:0;
    width:100%;
    height:100%;
    overflow:hidden;
    pointer-events:none;
    z-index:-1;
}

.particle{
    position:absolute;
    display:block;
    width:3px;
    height:3px;
    border-radius:50%;
    background:#38c9ff;
    opacity:0;
    box-shadow:
        0 0 6px rgba(56,201,255,.65),
        0 0 14px rgba(56,201,255,.35);
    animation:
        particleFloat linear infinite,
        particlePulse ease-in-out infinite;
}

@keyframes particleFloat{
    0%{
        transform:translate3d(0,110vh,0) scale(.55);
        opacity:0;
    }
    12%{
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
        transform:translate3d(calc(var(--drift) * -1),-12vh,0) scale(.45);
        opacity:0;
    }
}

@keyframes particlePulse{
    0%,100%{
        filter:brightness(.8);
    }
    50%{
        filter:brightness(1.8);
    }
}

@media(prefers-reduced-motion:reduce){
    .particle{
        animation:none;
        opacity:.25;
    }
}


body{

    min-height:100vh;

    color:#ffffff;

    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(0,180,255,.12),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 90%,
            rgba(86,83,255,.13),
            transparent 30%
        ),
        #050b14;
}


/* =====================================================
   SIDEBAR
===================================================== */

.sidebar{

    width:245px;

    height:100vh;

    position:fixed;

    left:0;
    top:0;

    padding:25px 18px;

    background:
        rgba(7,16,29,.92);

    border-right:
        1px solid
        rgba(255,255,255,.07);

    z-index:100;
}


.logo{

    display:flex;

    align-items:center;

    gap:11px;

    font-size:20px;

    font-weight:800;

    margin-bottom:45px;

    padding-left:8px;
}


.logo-icon{

    width:40px;

    height:40px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:11px;

    background:
        linear-gradient(
            135deg,
            #00aaff,
            #5b67ff
        );

    box-shadow:
        0 8px 25px
        rgba(0,170,255,.25);
}


.logo span{
    color:#38c9ff;
}


.menu-title{

    color:#52667d;

    font-size:10px;

    font-weight:800;

    letter-spacing:1.5px;

    padding-left:12px;

    margin-bottom:12px;

    text-transform:uppercase;
}


.menu{

    display:flex;

    flex-direction:column;

    gap:7px;
}


.menu a{

    display:flex;

    align-items:center;

    gap:12px;

    padding:13px 14px;

    color:#8295aa;

    text-decoration:none;

    border-radius:11px;

    font-size:13px;

    transition:.25s;
}


.menu a:hover{

    color:#ffffff;

    background:
        rgba(255,255,255,.05);
}


.menu a.active{

    color:#ffffff;

    background:
        linear-gradient(
            90deg,
            rgba(0,174,255,.16),
            rgba(82,95,255,.08)
        );

    border:
        1px solid
        rgba(0,174,255,.13);
}


.menu-icon{
    width:22px;
}


/* =====================================================
   SIDEBAR FOOTER
===================================================== */

.sidebar-bottom{

    position:absolute;

    bottom:25px;

    left:18px;

    right:18px;

    padding:15px;

    border-radius:13px;

    background:
        rgba(255,255,255,.035);

    border:
        1px solid
        rgba(255,255,255,.06);
}


.system-status{

    display:flex;

    align-items:center;

    gap:8px;

    color:#63e6a2;

    font-size:11px;

    font-weight:700;

    margin-bottom:6px;
}


.status-dot{

    width:7px;

    height:7px;

    border-radius:50%;

    background:#48e493;

    box-shadow:
        0 0 10px
        #48e493;
}


.sidebar-bottom p{

    color:#5d7087;

    font-size:10px;
}


/* =====================================================
   MAIN
===================================================== */

.main{

    margin-left:245px;

    padding:30px 4% 50px;

    min-height:100vh;
}


/* =====================================================
   HEADER
===================================================== */

.header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;
}


.header-left h1{

    font-size:29px;

    letter-spacing:-.5px;

    margin-bottom:6px;
}


.header-left p{

    color:#71859c;

    font-size:13px;
}


.header-actions{

    display:flex;

    gap:10px;
}


.action-btn{

    padding:11px 16px;

    border-radius:10px;

    color:#c6d3e1;

    background:
        rgba(255,255,255,.04);

    border:
        1px solid
        rgba(255,255,255,.08);

    text-decoration:none;

    font-size:12px;

    font-weight:700;

    transition:.25s;
}


.action-btn:hover{

    background:
        rgba(255,255,255,.08);

    transform:translateY(-2px);
}


.primary{

    color:white;

    background:
        linear-gradient(
            135deg,
            #009eff,
            #5967ff
        );

    border:0;
}


/* =====================================================
   STAT CARDS
===================================================== */

.stats{

    display:grid;

    grid-template-columns:
        repeat(4,1fr);

    gap:17px;

    margin-bottom:25px;
}


.stat-card{

    position:relative;

    padding:23px;

    overflow:hidden;

    border-radius:17px;

    background:
        rgba(12,25,42,.78);

    border:
        1px solid
        rgba(255,255,255,.07);

    transition:.3s;
}


.stat-card:hover{

    transform:translateY(-4px);

    border-color:
        rgba(44,201,255,.22);
}


.stat-top{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:17px;
}


.stat-icon{

    width:39px;

    height:39px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:10px;

    background:
        rgba(48,199,255,.09);

    font-size:17px;
}


.stat-label{

    color:#75899f;

    font-size:11px;

    font-weight:600;

    text-transform:uppercase;

    letter-spacing:.5px;
}


.stat-number{

    font-size:29px;

    font-weight:800;

    margin-bottom:4px;
}


.stat-description{

    color:#60748b;

    font-size:10px;
}


.green{
    color:#56e39a;
}


.red{
    color:#ff7385;
}


.blue{
    color:#42caff;
}


.purple{
    color:#9b91ff;
}


/* =====================================================
   DASHBOARD GRID
===================================================== */

.dashboard-grid{

    display:grid;

    grid-template-columns:
        1fr 310px;

    gap:20px;

    margin-bottom:25px;
}


/* =====================================================
   TABLE CARD
===================================================== */

.table-card{

    padding:24px;

    border-radius:18px;

    background:
        rgba(12,25,42,.78);

    border:
        1px solid
        rgba(255,255,255,.07);

    overflow:hidden;
}


.card-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:15px;

    margin-bottom:20px;
}


.card-header h2{

    font-size:17px;

    margin-bottom:5px;
}


.card-header p{

    color:#64788f;

    font-size:11px;
}


.search-form{

    display:flex;

    gap:7px;
}


.search-input{

    width:190px;

    padding:10px 12px;

    border-radius:9px;

    outline:none;

    border:
        1px solid
        #20334b;

    color:#ffffff;

    background:#081321;

    font-size:11px;
}


.search-input:focus{

    border-color:#24bfff;
}


.search-btn{

    padding:10px 13px;

    border:0;

    border-radius:9px;

    color:white;

    background:
        #087fca;

    cursor:pointer;
}


/* =====================================================
   TABLE
===================================================== */

.table-wrapper{

    width:100%;

    overflow-x:auto;
}


table{

    width:100%;

    border-collapse:collapse;

    min-width:700px;
}


thead{

    background:
        rgba(255,255,255,.025);
}


th{

    padding:13px 12px;

    text-align:left;

    color:#60758c;

    font-size:10px;

    text-transform:uppercase;

    letter-spacing:.7px;
}


td{

    padding:15px 12px;

    border-top:
        1px solid
        rgba(255,255,255,.05);

    color:#c2cfdd;

    font-size:12px;
}


tbody tr{

    transition:.2s;
}


tbody tr:hover{

    background:
        rgba(255,255,255,.025);
}


.id-badge{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    min-width:28px;

    height:28px;

    padding:0 7px;

    border-radius:7px;

    background:
        rgba(70,200,255,.08);

    color:#4dcfff;

    font-size:10px;

    font-weight:800;
}


.name{

    color:#f1f5f9;

    font-weight:600;
}


.email{

    color:#8196ad;
}


.phone{

    color:#aab8c8;
}


.verified-badge{

    display:inline-block;

    padding:5px 9px;

    border-radius:20px;

    color:#57dfa0;

    background:
        rgba(65,224,147,.08);

    font-size:9px;

    font-weight:800;
}


/* =====================================================
   SIDE PANEL
===================================================== */

.side-panel{

    display:flex;

    flex-direction:column;

    gap:18px;
}


.info-card{

    padding:23px;

    border-radius:18px;

    background:
        rgba(12,25,42,.78);

    border:
        1px solid
        rgba(255,255,255,.07);
}


.info-card h3{

    font-size:15px;

    margin-bottom:18px;
}


.progress-container{

    margin-bottom:17px;
}


.progress-label{

    display:flex;

    justify-content:space-between;

    margin-bottom:8px;

    color:#8195aa;

    font-size:11px;
}


.progress{

    height:7px;

    border-radius:20px;

    background:#142438;

    overflow:hidden;
}


.progress-bar{

    height:100%;

    width:<?= $uniquenessRate ?>%;

    border-radius:20px;

    background:
        linear-gradient(
            90deg,
            #00baff,
            #636bff
        );
}


.info-row{

    display:flex;

    justify-content:space-between;

    padding:11px 0;

    border-bottom:
        1px solid
        rgba(255,255,255,.05);

    font-size:11px;
}


.info-row:last-child{
    border-bottom:0;
}


.info-row span:first-child{
    color:#62768d;
}


.info-row span:last-child{
    color:#d3deea;

    font-weight:700;
}


/* =====================================================
   EMPTY STATE
===================================================== */

.empty{

    text-align:center;

    padding:55px 20px;

    color:#63768d;
}


.empty-icon{

    font-size:38px;

    margin-bottom:12px;
}


.empty h3{

    color:#a6b6c8;

    font-size:15px;

    margin-bottom:6px;
}


.empty p{

    font-size:11px;
}


/* =====================================================
   FOOTER
===================================================== */

.footer{

    text-align:center;

    color:#50647a;

    font-size:10px;

    padding:20px 0;
}


.footer strong{
    color:#7e93aa;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:1100px){

    .stats{

        grid-template-columns:
            repeat(2,1fr);
    }

    .dashboard-grid{

        grid-template-columns:1fr;
    }

}


@media(max-width:800px){

    .sidebar{

        width:70px;

        padding:20px 10px;
    }


    .logo{

        justify-content:center;

        padding:0;
    }


    .logo span,
    .menu-title,
    .menu a span,
    .sidebar-bottom{

        display:none;
    }


    .menu a{

        justify-content:center;

        padding:13px;
    }


    .main{

        margin-left:70px;

        padding:25px 4%;
    }


    .header{

        align-items:flex-start;

        gap:15px;

        flex-direction:column;
    }

}


@media(max-width:550px){

    .stats{

        grid-template-columns:1fr;
    }


    .card-header{

        align-items:flex-start;

        flex-direction:column;
    }


    .search-form{

        width:100%;
    }


    .search-input{

        width:100%;
    }


    .header-actions{

        width:100%;
    }


    .action-btn{

        flex:1;

        text-align:center;
    }

}

</style>

</head>


<body>

<!-- ADVANCED ANIMATED BACKGROUND PARTICLES -->
<div class="particle-field" id="particleField" aria-hidden="true"></div>

<script>
(function () {
    const field = document.getElementById("particleField");

    if (!field) return;

    const particleCount = window.innerWidth < 600 ? 22 : 48;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement("span");

        particle.className = "particle";

        const size = (Math.random() * 2.2 + 1.8).toFixed(2);
        const duration = (Math.random() * 14 + 12).toFixed(2);
        const pulseDuration = (Math.random() * 3 + 2).toFixed(2);
        const delay = (Math.random() * -20).toFixed(2);
        const left = (Math.random() * 100).toFixed(2);
        const drift = (Math.random() * 180 - 90).toFixed(0) + "px";

        particle.style.width = size + "px";
        particle.style.height = size + "px";
        particle.style.left = left + "%";
        particle.style.animationDuration =
            duration + "s, " + pulseDuration + "s";
        particle.style.animationDelay =
            delay + "s, " + delay + "s";
        particle.style.setProperty("--drift", drift);

        field.appendChild(particle);
    }
})();
</script>



<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">


    <div class="logo">

        <div class="logo-icon">
            🛡️
        </div>

        <span>
            DataGuard
        </span>

    </div>


    <div class="menu-title">
        Main Menu
    </div>


    <nav class="menu">

        <a href="dashboard.php"
           class="active">

            <div class="menu-icon">
                📊
            </div>

            <span>
                Dashboard
            </span>

        </a>


        <a href="index.php">

            <div class="menu-icon">
                ➕
            </div>

            <span>
                Add Record
            </span>

        </a>


        <a href="dashboard.php">

            <div class="menu-icon">
                👥
            </div>

            <span>
                Records
            </span>

        </a>

    </nav>


    <div class="sidebar-bottom">

        <div class="system-status">

            <span class="status-dot"></span>

            System Online

        </div>

        <p>
            DataGuard Protection Active
        </p>

    </div>

</aside>



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main class="main">


    <!-- HEADER -->

    <div class="header">

        <div class="header-left">

            <h1>
                Dashboard
            </h1>

            <p>
                Monitor and manage your verified data
            </p>

        </div>


        <div class="header-actions">

            <a href="dashboard.php"
               class="action-btn">

                ↻ Refresh

            </a>


            <a href="index.php"
               class="action-btn primary">

                + Add Record

            </a>

        </div>

    </div>



    <!-- =================================================
         STATISTICS
    ================================================= -->

    <section class="stats">


        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Total Attempts
                </span>

                <div class="stat-icon">
                    📈
                </div>

            </div>

            <div class="stat-number blue">

                <?= number_format($totalRecords) ?>

            </div>

            <div class="stat-description">
                All submitted records
            </div>

        </div>



        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Unique Records
                </span>

                <div class="stat-icon">
                    ✓
                </div>

            </div>

            <div class="stat-number green">

                <?= number_format($totalUnique) ?>

            </div>

            <div class="stat-description">
                Clean database records
            </div>

        </div>



        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Duplicates
                </span>

                <div class="stat-icon">
                    ⚠
                </div>

            </div>

            <div class="stat-number red">

                <?= number_format($totalDuplicates) ?>

            </div>

            <div class="stat-description">
                Duplicate attempts
            </div>

        </div>



        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Uniqueness
                </span>

                <div class="stat-icon">
                    ◉
                </div>

            </div>

            <div class="stat-number purple">

                <?= $uniquenessRate ?>%

            </div>

            <div class="stat-description">
                Database quality rate
            </div>

        </div>

    </section>



    <!-- =================================================
         DASHBOARD AREA
    ================================================= -->

    <section class="dashboard-grid">


        <!-- TABLE -->

        <div class="table-card">


            <div class="card-header">

                <div>

                    <h2>
                        Verified Records
                    </h2>

                    <p>
                        Unique data currently stored
                    </p>

                </div>


                <form
                    class="search-form"
                    method="GET"
                    action="dashboard.php">

                    <input
                        class="search-input"
                        type="text"
                        name="search"
                        value="<?= htmlspecialchars($search) ?>"
                        placeholder="Search records..."
                    >

                    <button
                        class="search-btn"
                        type="submit">

                        🔍

                    </button>

                </form>

            </div>



            <div class="table-wrapper">

            <?php if ($records && $records->num_rows > 0): ?>

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Phone</th>

                            <th>Status</th>

                            <th>Added On</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php while (
                        $row = $records->fetch_assoc()
                    ): ?>

                        <tr>

                            <td>

                                <span class="id-badge">

                                    #<?= (int)$row['id'] ?>

                                </span>

                            </td>


                            <td class="name">

                                <?= htmlspecialchars(
                                    $row['name']
                                ) ?>

                            </td>


                            <td class="email">

                                <?= htmlspecialchars(
                                    $row['email']
                                ) ?>

                            </td>


                            <td class="phone">

                                <?= htmlspecialchars(
                                    $row['phone']
                                ) ?>

                            </td>


                            <td>

                                <span
                                    class="verified-badge">

                                    ✓ VERIFIED

                                </span>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $row['created_at']
                                ) ?>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>


            <?php else: ?>


                <div class="empty">

                    <div class="empty-icon">
                        📂
                    </div>

                    <h3>
                        No records found
                    </h3>

                    <p>
                        Try another search or add a new record.
                    </p>

                </div>


            <?php endif; ?>

            </div>

        </div>



        <!-- =================================================
             SIDE INFORMATION
        ================================================= -->

        <div class="side-panel">


            <!-- DATA QUALITY -->

            <div class="info-card">

                <h3>
                    Data Quality
                </h3>


                <div class="progress-container">

                    <div class="progress-label">

                        <span>
                            Unique Data
                        </span>

                        <span>
                            <?= $uniquenessRate ?>%
                        </span>

                    </div>


                    <div class="progress">

                        <div
                            class="progress-bar">
                        </div>

                    </div>

                </div>


                <div class="info-row">

                    <span>
                        Stored Records
                    </span>

                    <span>
                        <?= $totalUnique ?>
                    </span>

                </div>


                <div class="info-row">

                    <span>
                        Duplicate Attempts
                    </span>

                    <span>
                        <?= $totalDuplicates ?>
                    </span>

                </div>


                <div class="info-row">

                    <span>
                        Total Checks
                    </span>

                    <span>
                        <?= $totalRecords ?>
                    </span>

                </div>

            </div>



            <!-- SYSTEM -->

            <div class="info-card">

                <h3>
                    System Information
                </h3>


                <div class="info-row">

                    <span>
                        Database
                    </span>

                    <span class="green">
                        ● Connected
                    </span>

                </div>


                <div class="info-row">

                    <span>
                        Validation
                    </span>

                    <span class="green">
                        Active
                    </span>

                </div>


                <div class="info-row">

                    <span>
                        Protection
                    </span>

                    <span class="blue">
                        Enabled
                    </span>

                </div>


                <div class="info-row">

                    <span>
                        Platform
                    </span>

                    <span>
                        PHP / MySQL
                    </span>

                </div>

            </div>


        </div>

    </section>



    <!-- FOOTER -->

    <div class="footer">

        <strong>
            DataGuard
        </strong>

        &nbsp; | &nbsp;

        Data Redundancy Removal System

        <br><br>

        CodeAlpha Cloud Computing Internship —
        Task 1

    </div>


</main>


</body>

</html>