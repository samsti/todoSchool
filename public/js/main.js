function handleUpdateFormSubmission(event) {
    event.preventDefault(); // prevent the form from submitting normally

    const newTodoName = prompt('Enter new todo name'); // prompt the user for the new name

    if (newTodoName !== null && newTodoName.trim() !== '') { // if the user entered a new name
        const form = event.target; // get the form element
        const input = form.querySelector('input[name="text"]'); // get the input element
        input.value = newTodoName.trim(); // update the input value with the new name
        form.submit(); // submit the form
    }

    return false; // prevent the form from submitting normally
}
