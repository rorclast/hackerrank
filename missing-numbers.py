#!/bin/python3

import os

# Complete the missingNumbers function below.
def missingNumbers(arr, brr):
    arr_count = {}
    brr_count = {}
    missing_numbers = []

    for value in arr:
        if value in arr_count.keys():
            arr_count[value] += 1
        else:
            arr_count[value] = 1

    for value in brr:
        if value in brr_count.keys():
            brr_count[value] += 1
        else:
            brr_count[value] = 1

    arr_count_keys = arr_count.keys()
    
    for k, v in brr_count.items():
        if not k in arr_count_keys or v != arr_count[k]:
            missing_numbers.append(k)

    missing_numbers.sort()

    return missing_numbers

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')
    n = int(input())
    arr = list(map(int, input().rstrip().split()))
    m = int(input())
    brr = list(map(int, input().rstrip().split()))
    result = missingNumbers(arr, brr)
    fptr.write(' '.join(map(str, result)))
    fptr.write('\n')
    fptr.close()
