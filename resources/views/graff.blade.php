<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortest Path Visualization</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .graph {
            position: relative;
            width: 400px;
            height: 400px;
            border: 1px solid #000;
        }
        .node {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: #f1f1f1;
            border: 2px solid #000;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
        }
        .edge {
            position: absolute;
            width: 3px;
            background-color: #000;
        }
        #i { top: 50%; left: 10%; transform: translate(-50%, -50%); }
        #a { top: 10%; left: 50%; transform: translate(-50%, -50%); }
        #b { top: 90%; left: 50%; transform: translate(-50%, -50%); }
        #c { top: 50%; left: 90%; transform: translate(-50%, -50%); }
        .result {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="graph">
        <div id="i" class="node">I</div>
        <div id="a" class="node">A</div>
        <div id="b" class="node">B</div>
        <div id="c" class="node">C</div>
        <div class="edge" style="top: 20%; left: 50%; height: 70%; transform: rotate(45deg);"></div>
        <div class="edge" style="top: 20%; left: 50%; height: 70%; transform: rotate(-45deg);"></div>
        <div class="edge" style="top: 80%; left: 50%; height: 70%; transform: rotate(45deg);"></div>
        <div class="edge" style="top: 80%; left: 50%; height: 70%; transform: rotate(-45deg);"></div>
    </div>
    <div class="result">
        @php include 'shortest_path.php'; @endphp
    </div>
</body>
</html>
