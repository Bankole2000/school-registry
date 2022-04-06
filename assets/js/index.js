document.addEventListener('DOMContentLoaded', () => {
  const registerBtn = document.getElementById('register-btn');
  const registerForm = document.getElementById('register-form');
  console.log({ registerForm, firstname: registerForm['FirstName'], lastname: registerForm['LastName'], email: registerForm['Email'], registerBtn });

  const registerStudentForm = async () => {
    const res = await fetch('./api/v1/student/create.php', {
      method: 'POST'
    });
    console.log({ res })
  }

  registerBtn.addEventListener('click', async (e) => {
    console.log('Clicked');
    e.preventDefault();
    await registerStudentForm();
  })
})


