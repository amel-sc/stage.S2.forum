const img = document.querySelector(".media-wrapper img");
img.onload = () => {
  const ratio = img.naturalWidth / img.naturalHeight;
  if (ratio < 0.7) {
    img.parentElement.classList.add("ratio-tall");
  } else if (ratio > 1.3) {
    img.parentElement.classList.add("ratio-wide");
  }
};