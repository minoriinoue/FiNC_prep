array = [2, 3, 3, 4, 5]

new_array = []

array.each do |number|
	if !new_array.include?(number)
		new_array.push(number)
	end
end

puts new_array
