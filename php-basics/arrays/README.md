# Exercises

## Exercise #1

See [exercise-1.php](./exercise-1.php)

## Exercise #2

See [exercise-2.php](./exercise-2.php)

## Exercise #3

See [exercise-3.php](./exercise-3.php)

## Exercise #4

Write a program that creates an array of ten integers.
It should put ten random numbers from 1 to 100 in the array.
It should copy all the elements of that array into another array of the same size.

Then display the contents of both arrays. To get the output to look like this, you'll need a several for loops.

  - Create an array of ten integers
  - Fill the array with ten random numbers (1-100)
  - Copy the array into another array of the same capacity
  - Change the last value in the first array to a -7
  - Display the contents of both arrays
  
```
Array 1: 45 87 39 32 93 86 12 44 75 -7
Array 2: 45 87 39 32 93 86 12 44 75 50
```

## Exercise #5

See [tic-tac-toe.php](./tic-tac-toe.php)

Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.

```
(...a game already in progress)

	X   O
	O X X
	  X O
 
'O', choose your location (row, column): 0 1

	X O O
	O X X
	  X O
 
'X', choose your location (row, column): 2 0

	X O O
	O X X
	X X O

The game is a tie.
```

## Exercise #6

Write a program to play a word-guessing game like Hangman.

  - It must randomly choose a word from a list of words.
  - It must stop when all the letters are guessed.
  - It must give them limited tries and stop after they run out.
  - It must display letters they have already guessed (either only the incorrect guesses or all guesses).
  
```
-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ _ _ _ _ _ _ _ _ 

Misses:	

Guess:	e

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ _ _ _ _ _ _ 

Misses:	

Guess:	i

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i _ _ _ _ _ 

Misses:	

Guess:	a

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a _ _ a _ 

Misses:	

Guess:	r

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a _ _ a _ 

Misses:	r

Guess:	s

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a _ _ a _ 

Misses:	rs

Guess:	t

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a t _ a _ 

Misses:	rs

Guess:	n

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a t _ a n 

Misses:	rs

Guess:	o

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a t _ a n 

Misses:	rso

Guess:	l

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	l e _ i a t _ a n 

Misses:	rso

Guess:	v

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	l e v i a t _ a n 

Misses:	rso

Guess:	h

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	l e v i a t h a n 

Misses:	rso

YOU GOT IT!

Play "again" or "quit"? quit
```