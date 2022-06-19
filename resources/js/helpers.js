export function loadImage(imageURI) {
    return `/plantImages?image=${encodeURIComponent(imageURI)}`;
}
