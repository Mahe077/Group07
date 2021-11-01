
  function close(){
    let alerts = document.querySelectorAll('.remove-alert');
    // console.log(alerts);
    for (let i = 0 ; i < alerts.length; i++) {
      alerts[i].addEventListener('click',()=>{
        alerts[i].parentElement.style.display = 'none';
        // console.log();
      })
    }
  }

  close();