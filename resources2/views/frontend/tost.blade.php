<div class="toast-container"></div>
@section('customscripts')

<script>
    const show_toast = (toast_header, toast_message, delay) => {
  
  const checkTime = (i) => {
    return (i < 10) ? "0" + i : i;
  }    
    
    var d = new Date();
    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];

    var month = d.getMonth()+1;
    var day = d.getDate();

    var today = d.getFullYear() + '/' +
        (month<10 ? '0' : '') + month + '/' +
        (day<10 ? '0' : '') + day;

      
    let displaydate =  monthNames[d.getMonth()]+' '+d.getDate()+', '+d.getFullYear();
        
    let toast_time =   displaydate;
  
  let toast_template_html = `
    <div aria-atomic="true" aria-live="assertive"
      class="toast position-fixed top-50 end-0 translate-middle-y m-3"
      role="alert" id="toast_message-${today}"
    >
      <div class="toast-header">
        <i class="fas fa-bell"></i>&nbsp;&nbsp;
        <strong class="me-auto">${toast_header}</strong>
        <small>${toast_time}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="toastclose"></button>
      </div>
      <div class="toast-body">${toast_message}</div>
    </div>
  `;
  
  const toast_wrapper = document.createElement('template');
  toast_wrapper.innerHTML = toast_template_html.trim();
  const awesome_toast = toast_wrapper.content.firstChild;
  document.querySelector('.toast-container').appendChild(awesome_toast);
  
  new bootstrap.Toast(
    awesome_toast,
    {
      autohide: false, /* set false for demonstration */
      delay: delay
    }
  ).show();
}

// Usage
show_toast('ഇന്നത്തെ വാചകം', 'വാതിൽപ്പടി സേവനം - അശരണർക്കും ആലംബഹീനർക്കും കരുതൽ സ്പർശമായി സർക്കാർ പ്രഖ്യാപിച്ച പദ്ധതിയാണ് വാതിൽപ്പടി സേവനം', 10000);

 document.querySelector("#toastclose").onclick = function() {
    $('.toast').toast('hide');
}
</script>
@endsection