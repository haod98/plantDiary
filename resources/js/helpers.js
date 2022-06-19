import { format } from "date-fns";

export function loadImage(imageURI) {
    return `/plantImages?image=${encodeURIComponent(imageURI)}`;
}

export function formatDate(date, dateFormat = "dd.MM.yyyy") {
    return format(new Date(date), dateFormat);
}
