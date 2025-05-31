<?php include '../admin/header.php'; ?>

<div class="admin-container">
    <h1>Donation Management</h1>
    
    <div class="admin-controls">
        <div class="search-filter">
            <input type="text" id="search-donations" placeholder="Search donations...">
            <select id="filter-status">
                <option value="">All Statuses</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
            <select id="filter-time">
                <option value="">All Time</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>
        </div>
        <button class="export-btn">Export to CSV</button>
    </div>

    <div class="donation-stats">
        <div class="stat-card">
            <div class="stat-value">$4,850</div>
            <div class="stat-label">Total Donations</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">142</div>
            <div class="stat-label">Total Donors</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">$34.15</div>
            <div class="stat-label">Average Donation</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">$1,200</div>
            <div class="stat-label">This Month</div>
        </div>
    </div>

    <div class="donations-table-container">
        <table class="donations-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donor Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1001</td>
                    <td>John Smith</td>
                    <td>john@example.com</td>
                    <td>$50.00</td>
                    <td>Credit Card</td>
                    <td>2023-06-15</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td>
                        <button class="action-btn view-btn">View</button>
                        <button class="action-btn receipt-btn">Receipt</button>
                    </td>
                </tr>
                <tr>
                    <td>#1002</td>
                    <td>Sarah Johnson</td>
                    <td>sarah@example.com</td>
                    <td>$100.00</td>
                    <td>PayPal</td>
                    <td>2023-06-14</td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td>
                        <button class="action-btn view-btn">View</button>
                        <button class="action-btn receipt-btn">Receipt</button>
                    </td>
                </tr>
                <tr>
                    <td>#1003</td>
                    <td>Michael Brown</td>
                    <td>michael@example.com</td>
                    <td>$25.00</td>
                    <td>Bank Transfer</td>
                    <td>2023-06-13</td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>
                        <button class="action-btn view-btn">View</button>
                        <button class="action-btn approve-btn">Approve</button>
                    </td>
                </tr>
                <tr>
                    <td>#1004</td>
                    <td>Emily Davis</td>
                    <td>emily@example.com</td>
                    <td>$75.00</td>
                    <td>Credit Card</td>
                    <td>2023-06-12</td>
                    <td><span class="status-badge failed">Failed</span></td>
                    <td>
                        <button class="action-btn view-btn">View</button>
                        <button class="action-btn retry-btn">Retry</button>
                    </td>
                </tr>
                <!-- More rows would be generated from database -->
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <button class="page-btn" disabled>Previous</button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">Next</button>
    </div>
</div>

<!-- Donation Detail Modal -->
<div class="modal" id="donation-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Donation Details</h2>
        <div class="modal-body">
            <!-- Content would be loaded via AJAX -->
        </div>
    </div>
</div>

<link rel="stylesheet" href="../css/admin_donations.css">
<script src="../js/admin_donations.js"></script>

<?php include 'footer.php'; ?>