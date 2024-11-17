<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Tips Search</title>

</head>

<body>
    <?php include 'Template/navbar.php' ?>
    <section class="search-section">
        <h2>Search for The Latest Online Safety Tips</h2>
        <script async src="https://cse.google.com/cse.js?cx=a143ffcb685864115">
        </script>
        <div class="gcse-search"></div>
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
    <section class="social-cards">
        <div class="Soc-Card">
            <div class="Soc-top">
                <img src="../media/Fb.png" alt="">
            </div>
            <div class="Soc-body">
                <h3>Safety Tips for Facebook</h3>
                <p>Learn how to use Facebook safely and effectively.</p>
            </div>
        </div>
        <div class="Soc-Card">
            <div class="Soc-top">
                <img src="../media/IG.png" alt="">
            </div>
            <div class="Soc-body">
                <h3>Safety Tips for Instagram</h3>
                <p>Learn how to use Instagram safely and effectively.</p>
            </div>
        </div>
        <div class="Soc-Card">
            <div class="Soc-top">
                <img src="../media/Twitter.png" alt="">
            </div>
            <div class="Soc-body">
                <h3>Safety Tips for Twitter</h3>
                <p>Learn how to use Twitter safely and effectively.</p>
            </div>
        </div>



    </section>
    <?php include './Template/footer.php' ?>
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
    <script src="./Template/JS/Javascript.js"></script>
    <script src="./Template/JS/routes.js"></script>
    <script>
        customCursor();
        activityHistory();
    </script>
</body>

</html>