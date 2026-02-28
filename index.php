<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Business Listing</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Raty -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/jquery.raty.min.js"></script>

</head>
<body class="container mt-5">

    <h2>Business Listing</h2>

    <button class="btn btn-primary mb-3" id="addBusinessBtn">Add Business</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Business Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
                <th>Average Rating</th>
            </tr>
        </thead>
        <tbody id="businessTable"></tbody>
    </table>

<?php include 'modals.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>