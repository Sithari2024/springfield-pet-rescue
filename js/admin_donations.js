document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('search-donations');
    const donationRows = document.querySelectorAll('.donations-table tbody tr');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        donationRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchTerm) ? '' : 'none';
        });
    });
    
    // Filter functionality
    const statusFilter = document.getElementById('filter-status');
    const timeFilter = document.getElementById('filter-time');
    
    function applyFilters() {
        const statusValue = statusFilter.value;
        const timeValue = timeFilter.value;
        const today = new Date();
        
        donationRows.forEach(row => {
            const status = row.querySelector('.status-badge').className.includes(statusValue);
            const dateStr = row.cells[5].textContent;
            const donationDate = new Date(dateStr);
            
            let timeMatch = true;
            if (timeValue === 'today') {
                timeMatch = donationDate.toDateString() === today.toDateString();
            } else if (timeValue === 'week') {
                const oneWeekAgo = new Date(today);
                oneWeekAgo.setDate(oneWeekAgo.getDate() - 7);
                timeMatch = donationDate >= oneWeekAgo;
            } else if (timeValue === 'month') {
                timeMatch = donationDate.getMonth() === today.getMonth() && 
                             donationDate.getFullYear() === today.getFullYear();
            }
            
            const shouldShow = (statusValue === '' || status) && timeMatch;
            row.style.display = shouldShow ? '' : 'none';
        });
    }
    
    statusFilter.addEventListener('change', applyFilters);
    timeFilter.addEventListener('change', applyFilters);
    
    // Modal functionality
    const modal = document.getElementById('donation-modal');
    const closeModal = document.querySelector('.close-modal');
    const viewButtons = document.querySelectorAll('.view-btn');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            // In a real app, you would fetch the donation details via AJAX
            const row = this.closest('tr');
            const donationId = row.cells[0].textContent;
            const donorName = row.cells[1].textContent;
            const amount = row.cells[3].textContent;
            
            document.querySelector('.modal-body').innerHTML = `
                <div class="detail-row">
                    <span class="detail-label">Donation ID:</span>
                    <span class="detail-value">${donationId}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Donor Name:</span>
                    <span class="detail-value">${donorName}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Amount:</span>
                    <span class="detail-value">${amount}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date:</span>
                    <span class="detail-value">${row.cells[5].textContent}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status:</span>
                    <span class="detail-value">${row.cells[6].textContent}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Method:</span>
                    <span class="detail-value">${row.cells[4].textContent}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">${row.cells[2].textContent}</span>
                </div>
            `;
            
            modal.style.display = 'flex';
        });
    });
    
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    // Export functionality
    document.querySelector('.export-btn').addEventListener('click', function() {
        // In a real app, this would trigger a server-side export
        alert('Export functionality would generate a CSV file in a real implementation');
    });
    
    // Action buttons
    document.querySelectorAll('.approve-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const statusBadge = row.querySelector('.status-badge');
            statusBadge.className = 'status-badge completed';
            statusBadge.textContent = 'Completed';
            this.replaceWith(createButton('Receipt', 'receipt-btn'));
        });
    });
    
    document.querySelectorAll('.retry-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const statusBadge = row.querySelector('.status-badge');
            statusBadge.className = 'status-badge pending';
            statusBadge.textContent = 'Pending';
            this.replaceWith(createButton('Approve', 'approve-btn'));
        });
    });
    
    function createButton(text, className) {
        const btn = document.createElement('button');
        btn.className = `action-btn ${className}`;
        btn.textContent = text;
        btn.addEventListener('click', function() {
            if (className === 'approve-btn') {
                const row = this.closest('tr');
                const statusBadge = row.querySelector('.status-badge');
                statusBadge.className = 'status-badge completed';
                statusBadge.textContent = 'Completed';
                this.replaceWith(createButton('Receipt', 'receipt-btn'));
            } else if (className === 'receipt-btn') {
                alert('Receipt would be generated in a real implementation');
            }
        });
        return btn;
    }
});