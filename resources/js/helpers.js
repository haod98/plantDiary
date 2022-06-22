import { format, differenceInDays } from "date-fns";

export function loadImage(imageURI) {
    return `/plantImages?image=${encodeURIComponent(imageURI)}`;
}

export function formatDate(date, dateFormat = "dd.MM.yyyy") {
    return format(new Date(date), dateFormat);
}

export function calculateRemainingDays(nextTimeToWater) {
    if (nextTimeToWater === null) return null;
    return differenceInDays(new Date(nextTimeToWater), new Date()) + 1; // +1 so it also includes todays day.
}
