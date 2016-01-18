def average(array)
	sum = 0
	array.each do |number|
		sum += number
	end
	return sum / array.length
end
