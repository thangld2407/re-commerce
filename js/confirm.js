function confirmDelete() {
    var del = confirm("Are you sure");
    if (del) {
        return true;
    } else {
        return false;
    }
}