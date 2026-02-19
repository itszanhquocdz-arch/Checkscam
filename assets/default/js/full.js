var isFullListShown = false;

function toggleScamList() {
    var shortList = document.getElementById('scam-list-short');
    var fullList = document.getElementById('scam-list-full');
    var toggleButton = document.getElementById('toggleButton');

    if (isFullListShown) {
        shortList.style.display = 'block';
        fullList.style.display = 'none';
        toggleButton.textContent ="Xem thêm";
    } else {
        shortList.style.display = 'none';
        fullList.style.display = 'block';
        toggleButton.textContent = "Rút gọn";
    }
    isFullListShown = !isFullListShown;
}