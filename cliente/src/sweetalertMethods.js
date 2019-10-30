const alerts = {
  errorModal(placement, error, message) {
    placement.$swal({
      type: "error",
      title: "Oops...",
      text: message,
      footer: error,
      confirmButtonColor: "#00716f",
      allowOutsideClick: true
    });
  },
  confirmAction(placement, message, confirm) {
    return new Promise(function(resolve, reject) {
      placement
        .$swal({
          title: message,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#00716f",
          cancelButtonColor: "#d33",
          confirmButtonText: confirm,
          cancelButtonText: "Cancelar",
          allowOutsideClick: false
        })
        .then(result => {
          if (result.value) {
            resolve(true);
          } else if (!result.value) {
            reject(false);
          }
        });
    });
  },
  successImage(
    placement,
    titleMessage,
    message,
    image,
    imgHeight,
    imgWidth,
    destination
  ) {
    placement
      .$swal({
        title: titleMessage,
        text: message,
        imageUrl: image,
        imageWidth: imgWidth,
        imageHeight: imgHeight,
        imageAlt: "Custom image",
        animation: false
      })
      .then(() => {
        window.location.replace(destination);
      });
  },
  successRedirect(placement, message, destination) {
    placement
      .$swal({
        type: "success",
        title: message,
        showConfirmButton: true,
        confirmButtonColor: "#00716f",
        allowOutsideClick: false
      })
      .then(() => {
        placement.$router.push({ name: destination });
      });
  },
  success(placement, message) {
    placement.$swal({
      position: "top-end",
      type: "success",
      title: message,
      showConfirmButton: false,
      allowOutsideClick: false,
      timer: 1500 //AÑADIDO POR KEVIN
    });
  },
  smallAlert(placement, message, Atype) {
    placement.$swal({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      type: Atype,
      title: message
    });
  },
  bigAlert(placement, message) {
    return new Promise(function(resolve, reject) {
      placement
        .$swal({
          title: message,
          timer: 1500,
          confirmButtonColor: "#00716f",
          allowOutsideClick: false
        })
        .then(result => {
          resolve(true);
        });
    });
  },
  requestData(placement, titleMessage, inputMessage, buttonText) {
    return new Promise(function(resolve, reject) {
      placement
        .$swal({
          title: titleMessage,
          input: "text",
          inputPlaceholder: inputMessage,
          inputAttributes: {
            autocapitalize: "off"
          },
          showCancelButton: true,
          confirmButtonText: buttonText,
          confirmButtonColor: "#00716f",
          allowOutsideClick: false
        })
        .then(result => {
          if (result.value) {
            resolve(result.value);
          } else {
            reject();
          }
        })
        .catch(() => reject());
    });
  }
};

export default alerts;
