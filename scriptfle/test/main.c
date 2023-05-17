#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <math.h>

int gcd(int a, int b) {
    int temp;
    while (1) {
        temp = a % b;
        if (temp == 0) return b;
        a = b;
        b = temp;
    }
}

int modpow(int base, int exponent, int modulus) {
    int result = 1;
    while (exponent > 0) {
        if (exponent % 2 == 1)
            result = (result * base) % modulus;
        base = (base * base) % modulus;
        exponent = exponent / 2;
    }
    return result;
}

int main() {
    int p, q, n, phi, e, d, message, encrypted, decrypted;

    // Step 1: Choose two random prime numbers
    p = 13 ; 
    q =17;

    // Step 2: Calculate n = p * q
    n = p * q;

    // Step 3: Calculate phi(n) = (p - 1) * (q - 1)
    phi = (p - 1) * (q - 1);

    // Step 4: Choose a public key e, such that 1 < e < phi(n) and gcd(e, phi(n)) = 1
    e = rand() % (phi - 2) + 2;
    while (1) {
        if (gcd(e, phi) == 1) break;
        else e++;
    }

    // Step 5: Calculate the private key d, such that d*e = 1 (mod phi(n))
    int k = 1;
    while (1) {
        k = k + phi;
        if (k % e == 0) {
            d = k / e;
            break;
        }
    }

    printf("Public key (e,n) = (%d,%d)\n", e, n);
    printf("Private key (d,n) = (%d,%d)\n", d, n);

    // Step 6: Encryption
    message = 78;
    encrypted = modpow(message, e, n);
    printf("Encrypted message = %d\n", encrypted);

    // Step 7: Decryption
    decrypted = modpow(encrypted, d, n);
    printf("Decrypted message = %d\n", decrypted);

    return 0;
}
