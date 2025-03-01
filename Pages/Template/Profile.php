<head>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<div class="pro">
    <div class="pro-top">
        <?php
        session_start();
        $fname = $_SESSION['firstname'];
        $lname = $_SESSION['lastname'];
        echo "<h1>" . $fname . " " . $lname . "</h1>";
        ?>
    </div>
    <div class="pro-bottom">
        <div class="pro-left">
            <div class="clickable" onclick="profileView()">Edit Profile</div>
            <div class="clickable" onclick="history()">Activity History</div>
            <div>Log Out</div>
            <div>Delete account</div>
        </div>
        <div class="pro-right">
            <div id="editprofile" class="editprofile">
                <form id="editAccountForm" method="POST">
                    <div class="names">
                        <div>
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </div>
                        <div>
                            <label for="lastname">Last Name:</label>
                            <input type="text" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div>
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <input type="submit" value="Save Changes">
                </form>

                <div id="update-message hidden"></div>
            </div>
            <script>
                const url = window.location.href;


                document.addEventListener("DOMContentLoaded", function() {
                    // Fetch user details to prefill the form when the page loads
                    fetch('../../controls/profile/userDetails.php')
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('firstname').value = data.user.firstname;
                                document.getElementById('lastname').value = data.user.lastname;
                                document.getElementById('dob').value = data.user.dob;
                                document.getElementById('email').value = data.user.email;
                            }
                        });

                    document.getElementById("editAccountForm").addEventListener("submit", async function(event) {
                        event.preventDefault();

                        // Get form data
                        const formData = new FormData(this);

                        try {
                            const response = await fetch('../../controls/updateUser.php', {
                                method: 'POST',
                                body: formData
                            });
                            const result = await response.json();

                            const messageDiv = document.getElementById('update-message');
                            if (result.success) {
                                messageDiv.style.color = 'green';
                                messageDiv.innerText = 'Account updated successfully!';
                            } else {
                                messageDiv.style.color = 'red';
                                messageDiv.innerText = result.message || 'Update failed';
                            }
                            messageDiv.style.display = 'block';
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    });
                });
            </script>
            <div id="activityhistory" class="activityhistory">
                <h2>Your Browsing History</h2>
                <div id="delete-message" style="display: none;"></div>
                <table id="historyTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="historyBody">
                        <!-- Browsing history entries will be populated here -->
                    </tbody>
                </table>



                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Fetch browsing history when the page loads
                        fetch('../../controls/profile/userHistory.php')
                            .then(response => response.json())
                            .then(data => {
                                const historyBody = document.getElementById('historyBody');
                                data.history.forEach(entry => {
                                    const row = document.createElement('tr');
                                    row.innerHTML = `
                        <td><a href'${entry.url}'>${entry.title}</td>
                        <td class='timestamp'>${new Date(entry.timestamp).toLocaleString()}</td>
                        <td><button class="delete-button" data-id="${entry.id}">Delete</button></td>
                    `;
                                    historyBody.appendChild(row);
                                });

                                // Add event listeners for delete buttons
                                const deleteButtons = document.querySelectorAll('.delete-button');
                                deleteButtons.forEach(button => {
                                    button.addEventListener('click', function() {
                                        const entryId = this.getAttribute('data-id');
                                        console.log(entryId);
                                        deleteHistory(entryId);
                                    });
                                });
                            });
                    });

                    function deleteHistory(entryId) {
                        if (confirm("Are you sure you want to delete this history entry?")) {
                            fetch('../../controls/profile/deleteHistory.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id: entryId
                                    })
                                })
                                .then(response => response.json())
                                .then(result => {
                                    const messageDiv = document.getElementById('delete-message');
                                    if (result.success) {
                                        messageDiv.style.color = 'green';
                                        messageDiv.innerText = 'History entry deleted successfully!';
                                        // Remove the row from the table
                                        document.querySelector(`button[data-id='${entryId}']`).closest('tr').remove();
                                    } else {
                                        messageDiv.style.color = 'red';
                                        messageDiv.innerText = result.message || 'Delete failed';
                                    }
                                    messageDiv.style.display = 'block';

                                    setTimeout(function() {
                                        messageDiv.style.display = 'none';
                                    }, 5000);
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    }
                </script>

            </div>
        </div>
    </div>
</div>


<script src="./JS/Javascript.js"></script>

<script>
    customCursor();
</script>
<script>
    const profile = document.getElementById('editprofile')
    const History = document.getElementById('activityhistory')
    profile.style.display = 'block'
    History.style.display = 'none'

    function profileView() {
        if (window.location.href == "http://localhost/SocialMediaCompany/P00202470_MaathMphepo_DW/SocialMediaCampaings/Pages/Template/Profile.php?param=hist") {
            window.location.href = 'http://localhost/SocialMediaCompany/P00202470_MaathMphepo_DW/SocialMediaCampaings/Pages/Template/Profile.php';
            profile.style.display = 'block'
            History.style.display = 'none'
        }else{
            profile.style.display = 'block'
            History.style.display = 'none'
        }

    }

    function history() {
        profile.style.display = 'none'
        History.style.display = 'block'
    }
    if (url == "http://localhost/SocialMediaCompany/P00202470_MaathMphepo_DW/SocialMediaCampaings/Pages/Template/Profile.php?param=hist") {
        history();
    }
</script>