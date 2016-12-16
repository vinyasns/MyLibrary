function validate(form) {
    if (form.user_name.length < 3) {
        alert("Username must contain less than 32 letters!");
        document.login_form.user_name.focus();
        return false;
    }
}
