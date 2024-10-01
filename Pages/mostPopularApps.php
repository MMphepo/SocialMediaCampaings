<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div with Background Video</title>
    <style>
        .video-background {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding-top: 50vh;
            color: white;
        }
    </style>
</head>
<body>

        <?php 
        include'./Template/navbar.php';
        ?>



/<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Safety Tips</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 8px;
        }
        input[type="button"] {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="button"]:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<h2>Search Safety Tips</h2>

<input type="text" id="searchInput" placeholder="Enter keyword...">
<input type="button" value="Search" id="searchButton">

<h3>Search Results:</h3>
<ul id="resultsList"></ul>

<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        const searchQuery = document.getElementById('searchInput').value;

        // Fetch search results from the API
        fetch(`search_api.php?search=${encodeURIComponent(searchQuery)}`)
            .then(response => response.json())
            .then(data => {
                const resultsList = document.getElementById('resultsList');
                resultsList.innerHTML = ''; // Clear previous results

                if (data.error) {
                    resultsList.innerHTML = `<li>${data.error}</li>`;
                } else if (data.message) {
                    resultsList.innerHTML = `<li>${data.message}</li>`;
                } else {
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.innerHTML = `<strong>${item.title}</strong><br>${item.description}`;
                        resultsList.appendChild(li);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>

</body>
</html>
