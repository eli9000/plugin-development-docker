(function ($) {
  $(document).ready(function () {
    console.log("php variables => ", alt_video_data);
    if (document.getElementById("xdUyEwVvQpcS")) {
      console.log("No Adblock detected... Showing primary video");
    } else {
      console.log("Adblock detected... Showing alternate video");
      let el = document.getElementById(alt_video_data.unique_id);
      el ? (el.innerHTML = alt_video_data.html) : null;
    }
  });
})(jQuery);
