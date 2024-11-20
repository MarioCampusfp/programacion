#ejercicio1
#import numpy as np
#array=np.zeros((3, 3))
#array[1,1]= 1
#print(array)

#ejercicio2
#import numpy as np
#array1=np.array([[4,8,4], [6,1,6]])
#array2=np.array([[1,6,8], [9,4,7]])
#suma= array1 + array2
#print(suma)

#ejercicio3
#import numpy as np
#array=np.arange(1,17).reshape(4,4)
#print(array[:, 2])

#ejercicio4
#import numpy as np
#array=np.array([[1,2,3],[4,5,6],[7,8,9],[2,4,6]])
#promedio=np.mean(array, axis=1)
#print(promedio)

#ejercicio5
import numpy as np
array=np.random.randint(1,51, size=(4,3))
maxixmo=np.max(array, axis=1)
print(maxixmo)