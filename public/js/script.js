// public/js/script.js

function confirmOrder(orderId, userEmail) {
    // Ajax request to your Laravel backend to confirm the order and send email
    $.ajax({
        type: 'POST',
        url: '/confirm-order/' + orderId,
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token for Laravel
            orderId: orderId,
            userEmail: userEmail
        },
        success: function (data) {
            alert('Confirmation email sent successfully!');
        },
        error: function (error) {
            console.error('Error:', error);
            alert('Error sending confirmation email');
        }
    });
}
