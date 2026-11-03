document.addEventListener(
    'DOMContentLoaded', () => {
        const f = document.getElementById('complaintForm');
        if (f) f.addEventListener('submit', e => {
            if (!document.getElementById('title').value.trim() || !document.getElementById('description').value.trim()) {
                e.preventDefault();
                alert('Please enter a title and description.')
            }
        }
        )
    }
);
