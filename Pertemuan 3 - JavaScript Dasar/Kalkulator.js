const tambah = (...angka) => {
    let hasil = 0;
    for(const i of angka) {
        hasil += i;
    }
    return hasil;
}

const kurang = (...angka) => {
    let hasil = 0;
    for(const i of angka) {
        hasil -= i;
    }
    return hasil;
}

const bagi = (...angka) => {
    let hasil = 0;
    for(const i of angka) {
        hasil /= i;
    }
    return hasil;
}

const kali = (...angka) => {
    let hasil = 0;
    for(const i of angka) {
        hasil *= i;
    }
    return hasil;
}

const mod = (...angka) => {
    let hasil = 0;
    for(const i of angka) {
        hasil %= i;
    }
    return hasil;
}


let hitung1 = tambah(10,5);
console.log(hitung1);

let hitung2 = kurang(10,5);
console.log(hitung2);

let hitung3 = bagi(10,5);
console.log(hitung3);

let hitung4 = kali(10,5);
console.log(hitung4);

let hitung5 = mod(10,5);
console.log(hitung5);
