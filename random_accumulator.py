# %%
import random


def getNumRandom():
    return random.randint(0, 100)


def random_accumulator():
    _res = 0
    while(True):
        num = getNumRandom()
        if(_res + num > 10000):
            break
        else:
            _res += num

    return _res


print(random_accumulator())
# %%
