def average(array)
	sum = 0
	array.each do |number|
		sum += number
	end
	sum / array.length
end
