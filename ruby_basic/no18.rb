a1 = [1, 2, 3]
a2 = []

i = 0
a1.each do |number|
	a2.push(number * 2)
end

puts "a1 = " + a1.to_s
puts "a2 = " + a2.to_s

