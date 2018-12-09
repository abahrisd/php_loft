
const buyButton = document.getElementById('buyButton');
if (buyButton) {
    document.getElementById('buyButton').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'block';
    });

    document.getElementById('popup-close').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
    });
}


