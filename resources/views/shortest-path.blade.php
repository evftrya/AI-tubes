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
            flex-direction: column;
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
        #i { top: 50%; left: 10%; transform: translate(-50%, -50%); }
        #a { top: 10%; left: 50%; transform: translate(-50%, -50%); }
        #b { top: 90%; left: 50%; transform: translate(-50%, -50%); }
        #c { top: 50%; left: 90%; transform: translate(-50%, -50%); }
        .result {
            margin-top: 20px;
            text-align: center;
        }
        svg {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: visible;
        }
        line {
            stroke: black;
            stroke-width: 2;
        }
    </style>
</head>
<body>
    <div class="graph">
        <div id="i" class="node">I</div>
        <div id="a" class="node">A</div>
        <div id="b" class="node">B</div>
        <div id="c" class="node">C</div>
        <svg>
            <line x1="10%" y1="50%" x2="50%" y2="10%"></line>
            <line x1="50%" y1="10%" x2="50%" y2="90%"></line>
            <line x1="50%" y1="90%" x2="90%" y2="50%"></line>
            <line x1="90%" y1="50%" x2="10%" y2="50%"></line>
            <line x1="90%" y1="50%" x2="20%" y2="50%"></line>
        </svg>
    </div>
    <div class="result">
        @if ($result['distance'] !== null)
            <p>Shortest distance from 'i' to 'c': {{ $result['distance'] }}</p>
            <p>Path: {{ implode(' -> ', $result['path']) }}</p>
        @else
            <p>No path found from 'i' to 'c'.</p>
        @endif
    </div>
</body>
</html>
