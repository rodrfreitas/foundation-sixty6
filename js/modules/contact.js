export function contact() {
  const form = document.querySelector("#contactForm");
  const feedback = document.querySelector("#feedback");

  function regForm(event) {
    event.preventDefault();
    const thisform = event.currentTarget;
    const url = "adduser.php";
    // console.log(thisform.elements.fname.value);
    const formdata =
      "fname=" +
      thisform.elements.fname.value +
      "&email=" +
      thisform.elements.email.value +
      "&message=" +
      thisform.elements.message.value;
    console.log(formdata);

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: formdata,
    })
      .then((response) => response.json())
      .then((responseText) => {
        console.log(responseText);
        feedback.innerHTML = "";

        if (responseText.errors) {
          responseText.errors.forEach((error) => {
            const errorElement = document.createElement("p");
            errorElement.textContent = error;
            feedback.appendChild(errorElement);
          });
        } else {
          form.reset();
          const messageElement = document.createElement("p");
          messageElement.textContent = responseText.message;
          feedback.appendChild(messageElement);
        }
      })
      .catch((error) => {
        console.log(error);
        const messageElement = document.createElement("p");
        messageElement.textContent =
          "Whoops, it looks like you're either using an older browser, not connected to the internet or out server is having issues. Sorry about that! Please try again later.";
        feedback.appendChild(messageElement);
      });
  }

  form.addEventListener("submit", regForm);
}
