<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Tips Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .search-section {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .filters {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .filters select {
            width: 48%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .results {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 20px;
            min-height: 100px;
        }

        .results div {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        .results div:last-child {
            border-bottom: none;
        }

        .results h3 {
            margin: 0;
            font-size: 18px;
        }

        .results p {
            margin: 5px 0 0;
        }
    </style><!-- Link to your styles -->
</head>

<body>
    <section class="search-section">
        <h2>Search Online Safety Tips</h2>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search for safety tips..." onchange="searchonly()">
        </div>

        <!-- Filters -->
        <div class="filters">
            <select id="platformFilter" onchange="fetchSafetyTips()">
                <option value="">Select Platform</option>
                <!-- Populate platforms dynamically -->
            </select>

            <select id="methodFilter" onchange="fetchSafetyTips()">
                <option value="">Select Safety Method</option>
                <!-- Populate safety methods dynamically -->
            </select>
        </div>

        <!-- Results Section -->
        <div class="results" id="safetyTipsResults">
            <!-- Results will be displayed here -->
        </div>
    </section>

    <script>
        // On page load, fetch platforms and safety methods to populate filters
        document.addEventListener("DOMContentLoaded", () => {
            fetchPlatforms();
            fetchSafetyMethods();
        });

        // Fetch platforms from the backend
        function fetchPlatforms() {
            fetch('../controls/search/getPlatforms.php')
                .then(response => response.json())
                .then(data => {
                    const platformSelect = document.getElementById('platformFilter');
                    data.forEach(platform => {
                        const option = document.createElement('option');
                        option.value = platform.id;
                        option.textContent = platform.platform_name;
                        platformSelect.appendChild(option);
                    });
                });
        }

        // Fetch safety methods from the backend
        function fetchSafetyMethods() {
            fetch('../controls/search/getSafetyMethod.php')
                .then(response => response.json())
                .then(data => {
                    const methodSelect = document.getElementById('methodFilter');
                    data.forEach(method => {
                        const option = document.createElement('option');
                        option.value = method.id;
                        option.textContent = method.method_name;
                        methodSelect.appendChild(option);
                    });
                });
        }

        // Fetch safety tips based on the search input and filters
        function fetchSafetyTips() {
            const searchTerm = document.getElementById('searchInput').value;
            const platform = document.getElementById('platformFilter').value;
            const method = document.getElementById('methodFilter').value;

            // Build query parameters
            let params = new URLSearchParams();
            if (searchTerm) params.append('search', searchTerm);
            if (platform) params.append('platform', platform);
            if (method) params.append('method', method);

            // Fetch tips from backend
            fetch(`../controls/search/getTips.php?${params.toString()}`)
                .then(response => response.json())
                .then(data => {
                    const resultsDiv = document.getElementById('safetyTipsResults');
                    resultsDiv.innerHTML = ''; // Clear previous results

                    if (data.length > 0) {
                        data.forEach(tip => {
                            const tipDiv = document.createElement('div');
                            const title = document.createElement('h3');
                            title.textContent = tip.title;
                            const description = document.createElement('p');
                            description.textContent = tip.description;

                            tipDiv.appendChild(title);
                            tipDiv.appendChild(description);
                            resultsDiv.appendChild(tipDiv);
                        });
                    } else {
                        resultsDiv.innerHTML = '<p>No safety tips found.</p>';
                    }
                })
                .catch(error => console.error('Error fetching safety tips:', error));
        }
    </script> <!-- Link to your JavaScript -->
    <script>
        function searchonly() {
            const method = document.getElementById('searchInput').value;


            // Build the query string
            let query = new URLSearchParams();
            if (method) query.append('search', method);


            // Fetch results from the backend
            fetch(`../controls/search/getTips.php?${query.toString()}`)
                .then(response => response.json())
                .then(data => {
                    const resultsDiv = document.getElementById('safetyTipsResults');
                    resultsDiv.innerHTML = ''; // Clear previous results
                    console.log(data)
                    if (data.length > 0) {
                        data.forEach(tip => {
                            const tipDiv = document.createElement('div');
                            const title = document.createElement('h3');
                            title.textContent = tip.title;
                            const description = document.createElement('p');
                            description.textContent = tip.description;

                            tipDiv.appendChild(title);
                            tipDiv.appendChild(description);
                            resultsDiv.appendChild(tipDiv);
                        });
                    } else {
                        resultsDiv.innerHTML = '<p>No safety tips found.</p>';
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>