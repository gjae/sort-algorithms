def merge(arr, right, left):

    i = j = k = 0

    while i < len(left) and j < len(right):
        if left[i] < right[j]:
            arr[k] = left[i]
            i+= 1
        else:
            arr[k] = right[j]
            j+= 1
        
        k += 1
    
    while i < len(left):
        arr[k] = left[i]
        k += 1
        i += 1

    while j < len(right):
        arr[k] = right[j]
        j += 1
        k += 1


def mergesort(arr: list):
    if len(arr) > 1:
        mid = len(arr) // 2
        left = arr[:mid]
        right = arr[mid:]

        mergesort(left)
        mergesort(right)
        merge(arr, left, right)


lista = [44, 56, 100, 1000, 32, 2, 1, -4, 5]

print(lista)
mergesort(lista)
print(lista)