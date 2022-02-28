function fibonacci(suku)
{
	var suku1 = 0;
	var suku2 = 1;
	var sukuN;
	
	console.log("Deret Fibonacci hingga Suku ke-"+suku+" :");

	for (var i = 0; i < suku; i++)
	{
		console.log(suku1);
		sukuN = suku1 + suku2;
		suku1 = suku2;
		suku2 = sukuN;
	}
}

console.log(fibonacci(5));
console.log(fibonacci(10));
