<?php
session_start();

if (!isset($_SESSION['completed_challenges'])) {
    $_SESSION['completed_challenges'] = [];
}

function isChallengeCompleted($challenge) {
    return in_array($challenge, $_SESSION['completed_challenges']);
}

if (isset($_GET['complete'])) {
    $_SESSION['completed_challenges'][] = $_GET['complete'];
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Healthcare CTF</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #5D6975; }
        .challenge { margin: 20px 0; padding: 20px; background: #e8f1f5; border-left: 5px solid #5D6975; }
        .completed { background: #c8e6c9; border-left: 5px solid #388e3c; }
        .cta { display: inline-block; padding: 10px 15px; color: #fff; background: #5D6975; text-decoration: none; border-radius: 5px; }
        .cta:hover { background: #3d4a5d; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Healthcare CTF</h1>
        <p>Welcome to our healthcare CTF. Complete each challenge to progress to the next.</p>

        <div class="challenge <?php echo isChallengeCompleted('sql_injection') ? 'completed' : ''; ?>">
            <h2>Challenge 1: SQL Injection</h2>
            <p>Find the flag to proceed.</p>
            <?php if (isChallengeCompleted('sql_injection')): ?>
                <p>Challenge Completed! <a href="index.php?complete=xxe" class="cta">Next Challenge</a></p>
            <?php else: ?>
                <a href="sql_injection.php" class="cta">Start Challenge</a>
            <?php endif; ?>
        </div>

        <?php if (isChallengeCompleted('sql_injection')): ?>
        <div class="challenge <?php echo isChallengeCompleted('xxe') ? 'completed' : ''; ?>">
            <h2>Challenge 2: XXE Vulnerability</h2>
            <p>Find the flag to proceed.</p>
            <?php if (isChallengeCompleted('xxe')): ?>
                <p>Challenge Completed! <a href="index.php?complete=lfi" class="cta">Next Challenge</a></p>
            <?php else: ?>
                <a href="xxe.php" class="cta">Start Challenge</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (isChallengeCompleted('xxe')): ?>
        <div class="challenge <?php echo isChallengeCompleted('lfi') ? 'completed' : ''; ?>">
            <h2>Challenge 3: Local File Inclusion (LFI)</h2>
            <p>Find the flag to proceed.</p>
            <?php if (isChallengeCompleted('lfi')): ?>
                <p>Challenge Completed! <a href="index.php?complete=rce" class="cta">Next Challenge</a></p>
            <?php else: ?>
                <a href="lfi.php" class="cta">Start Challenge</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (isChallengeCompleted('lfi')): ?>
        <div class="challenge <?php echo isChallengeCompleted('rce') ? 'completed' : ''; ?>">
            <h2>Challenge 4: Remote Code Execution (RCE)</h2>
            <p>Find the flag to complete the CTF.</p>
            <?php if (isChallengeCompleted('rce')): ?>
                <p>Challenge Completed! Congratulations!</p>
            <?php else: ?>
                <a href="rce.php" class="cta">Start Challenge</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
