<?php
include('./header.php');

?>


    <div class="container" style="margin-top: 30px;">
        <div class="heading">
            <h3  style="margin-bottom: 20px; text-align: 'center'">Movie List</h3>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Revenue</th>
                    <th scope="col">Runtime</th>
                    <th scope="col">IMDB</th>
                </tr>
            </thead>
            <tbody id="table_body">

            </tbody>
        </table>



    </div>

    <script>
        document.addEventListener('DOMContentLoaded', getData);

        function getData() {
            fetch('api/movie/read.php')
                .then((res) => res.json())
                .then((data) => {


                    let tbody = document.getElementById('table_body');

                    let output = '';
                    for (i = 0; i < data['records'].length; i++) {
                        output += `<tr>
                        <td>${data['records'][i]['movie_id']}</td>
                        <td>${data['records'][i]['title']}</td>
                        <td>${data['records'][i]['budget']}</td>
                        <td>${data['records'][i]['release_date']}</td>
                        <td>${data['records'][i]['revenue']}</td>
                        <td>${data['records'][i]['runtime']}</td>
                        <td>${data['records'][i]['vote_average']}</td>
                    </tr>`;
                    }
                    tbody.innerHTML = output;

                });
        }
    </script>

</body>

</html>